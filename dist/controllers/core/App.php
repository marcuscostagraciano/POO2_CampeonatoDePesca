<?php

namespace dist\controllers\core;

use Exception;

class App{
    private string $class, $method;

    public function __construct(){
        $this->router();

        $class_file = implode('/', explode('\\', $this->class)) .'.php';

        if(!file_exists($class_file)) throw new Exception("Não foi possível encontrar o arquivo {$class_file}");

        if(class_exists($this->class)) $object = new $this->class();
        else throw new Exception("Não foi possível encontrar a classe {$this->class}");

        if(method_exists($object, $this->method)) call_user_func_array([$object, $this->method], []);
        else throw new Exception("Não foi possível encontrar o método {$this->method}");
    }

    private function router(): void{
        $uri = array_filter(explode("/", $_SERVER["REQUEST_URI"]));

        $this->class  = "dist\\controllers\\". ($uri[1] ?? "Home");
        $this->method = $uri[2] ?? "printView";
    }
}

?>