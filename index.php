<?php

/**
 * Aqui vamos escrever tudo que queremos que inicie logo que o site abrir.
 * No caso, será o autoloader.php.
 */

// require_once "autoloader.php";

require_once "dist/controllers/core/Router.php";

use dist\controllers\core\Router;

$router = new Router;

?>