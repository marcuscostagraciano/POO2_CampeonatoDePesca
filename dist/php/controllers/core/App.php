<?php

namespace dist\php\controllers\core;
use FFI\Exception;

class App{
    private string $class, $method;

    public function __construct(){
        $this->router();

        if(class_exists($this->class)) $object = new $this->class();
        else throw new Exception("Não foi possível encontrar a classe {$this->class}");

        if(method_exists($object, $this->method)) call_user_func_array([$object, $this->method], []);
        else throw new Exception("Não foi possível encontrar o método {$this->method}");
    }

    private function router(): void{
        $uri = array_filter(explode("/", $_SERVER["REQUEST_URI"]));

        $this->class  = "dist\\php\\controllers\\". ($uri[2] ?? "Teste");
        $this->method = $uri[3] ?? "printView";
    }
}

?>