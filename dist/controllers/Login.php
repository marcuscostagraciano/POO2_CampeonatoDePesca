<?php

namespace dist\controllers;

use dist\views\MainView;
use dist\controllers\core\Session;
use dist\models\LoginModel;

class Login {
    public function printView(): void{
        MainView::printView("login");
    }

    public function logar(): void{
        $usuario_info = LoginModel::logar($_POST["usuario_login"], $_POST["usuario_senha"]);

        Session::criar($usuario_info["cpf"], $usuario_info["nome"], $usuario_info["email"]);
    }

    public function deslogar(): void{
        Session::destruir();
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