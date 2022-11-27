<?php

namespace dist\controllers;

use dist\views\MainView;
use dist\controllers\core\Session;

class Login {
    public function printView(): void{
        MainView::printView("login");
    }

    public function logar(): void{
        $id = 0;

        Session::criar($id, $_POST["usuario_login"], $_POST["usuario_senha"]);
    }

    public function deslogar(): void{
        Session::destruir();
        header("Refresh:0");
    }

    public function existe(): array{
        $sessao_existe = Session::existe();

        return [
            "esta_logado" => $sessao_existe,
            "usuario"     => $sessao_existe ? Session::nome() : ""
        ];
    }
}

?>