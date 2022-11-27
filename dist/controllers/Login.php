<?php

namespace dist\controllers;

use dist\views\MainView;
use dist\controllers\core\Session;

class Login {
    public function printView(){
        MainView::printView("login");
    }

    public function logar(){
        $id = 0;

        Session::criar($id, $_POST["usuario_login"], $_POST["usuario_senha"]);
    }
}

?>