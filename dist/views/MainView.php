<?php

namespace dist\views;

class MainView{
    public static function printView(string $dir, string $file = "index.php"): void{
        require_once "html_files/header_footer/header.php";
        require_once "html_files/{$dir}/{$file}";
        require_once "html_files/header_footer/footer.php";
    }
}

?>