<?php

namespace dist\controllers\core;

use dist\controllers\core\Session;
use dist\utility\Retorno;
use Exception;
use Throwable;

class App{
    private string $class, $method;

    public function __construct(){
        try{
            $this->router();

            $class_file = implode('/', explode('\\', $this->class)) .'.php';

            if(!file_exists($class_file)) throw new Exception("Não foi possível encontrar o arquivo {$class_file}");
            if(!class_exists($this->class)) throw new Exception("Não foi possível encontrar a classe {$this->class}");

            $object = new $this->class();

            if(!method_exists($object, $this->method)) throw new Exception("Não foi possível encontrar o método {$this->method}");

            $object->{$this->method}();
        }
        catch(Throwable $e){
            Retorno::erro($e->getMessage());
        }
    }

    private function router(){
        $this->class  = "dist\\controllers\\". ($_GET["pg"] ?? "Home");
        $this->method = $_GET["acao"] ?? "printView";

        return true;
    }
}

?>