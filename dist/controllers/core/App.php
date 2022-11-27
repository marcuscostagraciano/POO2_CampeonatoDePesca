<?php

namespace dist\controllers\core;

use dist\controllers\core\Session;
use Exception;
use Throwable;

class App{
    private string $class, $method;

    public function __construct(){
        try{
            $this->router();

            $class_file = implode('/', explode('\\', $this->class)) .'.php';

            if(!file_exists($class_file)) throw new Exception("Não foi possível encontrar o arquivo {$class_file}");

            if(class_exists($this->class)) $object = new $this->class();
            else throw new Exception("Não foi possível encontrar a classe {$this->class}");

            if(method_exists($object, $this->method)) echo json_encode(call_user_func_array([$object, $this->method], []));
            else throw new Exception("Não foi possível encontrar o método {$this->method}");
        }
        catch(Throwable $e){
            echo json_encode($e->getMessage());
        }
    }

    private function router(): void{
        $uri = array_reverse(array_filter(explode("/", $_SERVER["REQUEST_URI"])));
        // Session::destruir();

        $this->class  = Session::existe() ? "dist\\controllers\\". ($uri[1] ?? "Home") : "dist\\controllers\\Login";
        $this->method = $uri[0] ?? "printView";
    }
}

?>