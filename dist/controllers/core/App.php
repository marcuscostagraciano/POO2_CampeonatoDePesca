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

            if(method_exists($object, $this->method)) {
                $resultado = call_user_func_array([$object, $this->method], []);

                echo json_encode([
                    "ok"      => true,
                    "retorno" => $resultado ?? true
                ]);
            }
            else throw new Exception("Não foi possível encontrar o método {$this->method}");
        }
        catch(Throwable $e){
            echo json_encode(["error" => $e->getMessage()]);
        }
    }

    private function router(): bool{
        $this->class  = "dist\\controllers\\". ($_GET["pg"] ?? "Home");
        $this->method = $_GET["acao"] ?? "printView";

        return true;
    }
}

?>