<?php

namespace dist\controllers;

use dist\models\CadastroModel;
use dist\views\MainView;
use dist\utility\Formatar;

class Cadastro {
    public function printView(): bool{
        MainView::printView("cadastro");

        return true;
    }

    public function cadastrar(): bool{
        $_POST["usuario_cpf"] = Formatar::cpfStringParaInt($_POST["usuario_cpf"]);

        CadastroModel::cadastrar($_POST["usuario_cpf"], $_POST["usuario_nome"], $_POST["usuario_sobrenome"], $_POST["usuario_senha"], $_POST["usuario_email"]);

        return true;
    }
}

?>