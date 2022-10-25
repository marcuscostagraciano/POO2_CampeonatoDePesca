<?php

namespace dist\php\controllers\core;

class App{
    private string $class, $method;

    public function __construct(){
        $this->router();

        if(class_exists($this->class))

        $object = new $this->class();
    }

    private function router(): void{
        $uri = array_filter(explode("/", $_SERVER["REQUEST_URI"]));

        $this->class  = $uri[2] ?? "Teste";
        $this->method = $uri[3] ?? "";
    }
}

?>