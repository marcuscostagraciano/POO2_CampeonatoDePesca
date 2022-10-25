<?php

/**
 * Aqui vamos escrever tudo que queremos que inicie logo que o site abrir.
 * No caso, será o autoloader.php.
 */

require_once "autoloader.php";

use dist\php\controllers\core\App;

try{
    $router = new App();
}
catch(Throwable $e){
    print_r($e->getMessage());
}

?>