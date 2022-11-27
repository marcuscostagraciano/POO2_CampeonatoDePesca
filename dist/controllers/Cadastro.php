<?php

namespace dist\controllers;

use dist\views\MainView;

class Cadastro {
    public function printView(): void{
        MainView::printView("cadastro");
    }
}

?>