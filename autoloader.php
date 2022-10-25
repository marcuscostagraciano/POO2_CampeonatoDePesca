<?php

spl_autoload_register(function ($class){
    $class_file = str_replace("\\", "/", $class);

    require_once $class_file .".php";
});

?>