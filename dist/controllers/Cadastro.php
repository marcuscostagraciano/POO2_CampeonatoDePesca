<?php

namespace dist\controllers;

use dist\models\CadastroModel;
use dist\views\MainView;
use dist\utility\Formatar;
use dist\utility\Retorno;
use Exception;
use Throwable;

class Cadastro {
    public function printView(){
        MainView::printView("cadastro");

        return true;
    }

    public function cadastrar(){
        $_POST["usuario_cpf"] = Formatar::cpfStringParaInt($_POST["usuario_cpf"]);

        CadastroModel::cadastrar($_POST["usuario_cpf"], $_POST["usuario_nome"], $_POST["usuario_sobrenome"], $_POST["usuario_senha"], $_POST["usuario_email"]);
        Retorno::ok();
    }
}

?>