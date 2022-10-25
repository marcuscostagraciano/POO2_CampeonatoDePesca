<?php

namespace dist\php\views;

class MainView{
    public function __construct($dir, $file = "index.php"){
        require_once "html_files/header.php";
        require_once "html_files/{$dir}/{$file}";
        require_once "html_files/footer.php";
    }
}

?>