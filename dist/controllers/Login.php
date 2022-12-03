<?php

namespace dist\controllers;

use dist\views\MainView;
use dist\controllers\core\Session;
use dist\models\LoginModel;
use dist\utility\Formatar;

class Login {
    public function printView(): bool{
        MainView::printView("login");

        return true;
    }

    public function logar(): bool{
        $_POST["usuario_cpf"] = Formatar::cpfStringParaInt($_POST["usuario_cpf"]);
        
        $usuario_info = LoginModel::logar($_POST["usuario_cpf"], $_POST["usuario_senha"]);

        if(empty($usuario_info)) return false;
        
        Session::criar($usuario_info[0]["pk_cpf"], $usuario_info[0]["nome"], $usuario_info[0]["email"]);
        return true;
    }

    public function deslogar(): bool{
        Session::destruir();

        return true;
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