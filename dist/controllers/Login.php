<?php

namespace dist\controllers;

use dist\views\MainView;
use dist\controllers\core\Session;
use dist\models\LoginModel;
use dist\utility\Formatar;
use dist\utility\Retorno;

class Login {
    public function printView(){
        MainView::printView("login");
    }

    public function logar(){
        $_POST["usuario_cpf"] = Formatar::cpfStringParaInt($_POST["usuario_cpf"]);
        
        $usuario_info = LoginModel::logar($_POST["usuario_cpf"], $_POST["usuario_senha"]);

        if(empty($usuario_info)) Retorno::ok(["sucesso" => false]);
        
        Session::criar($usuario_info[0]["pk_cpf"], $usuario_info[0]["nome"], $usuario_info[0]["email"]);
        Retorno::ok(["sucesso" => true]);
    }

    public function deslogar(){
        Session::destruir();
    }

    public function existe(){
        $sessao_existe = Session::existe();

        Retorno::ok([
            "esta_logado" => $sessao_existe,
            "usuario"     => $sessao_existe ? Session::nome() : ""
        ]);
    }
}

?>