<?php

spl_autoload_register(function ($class){
    $class_file = str_replace("/", "\\", $class);

    if(file_exists($class_file)) require_once $class_file;
});

?>