<?php

namespace dist\controllers;

use dist\views\MainView;

class Home{
    public function printView(){
        MainView::printView("home");
    }
}

?>