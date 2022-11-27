<?php

namespace dist\controllers;

use dist\controllers\core\Session;
use dist\views\MainView;

class Home{
    public function printView(){
        MainView::printView("home");
    }
}

?>