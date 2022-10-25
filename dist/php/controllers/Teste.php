<?php

namespace dist\php\controllers;
use dist\php\views\MainView;

class Teste{
    public function printView(): void{
        new MainView("Teste");
    }
}

?>