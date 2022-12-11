<?php

namespace dist\controllers\core;

use Exception;
use Throwable;

class Router
{
    protected $controller = "Home";
    protected $method = "printView";
    protected $params = [];

    public function __construct()
    {
        try {
            $url = $this->parseUrl();
            
            $this->controller = "dist\\controllers\\" . ucfirst($url[0]);
            unset($url[0]);
            
            if (!class_exists($this->controller)) throw new Exception("Classe \"{$this->controller}\" não encontrada");
            $this->controller = new $this->controller;

            if (isset($url[1]) && method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            }

            $this->params = $url ? array_values($url) : [];

            call_user_func_array([$this->controller, $this->method], $this->params);
        }
        catch(Throwable $e) {
            echo $e->getMessage();
        }
    }

    public function parseUrl()
    {
        // if (isset($_GET["url"])) {
        if (isset($_GET["url"])) {
            return $url = explode("/", filter_var(rtrim($_GET["url"], "/"), FILTER_SANITIZE_URL));
        }
        return $url = [$this->controller, $this->method];
    }
}


?>