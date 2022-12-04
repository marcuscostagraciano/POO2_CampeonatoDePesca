<?php

namespace dist\models;

use dist\models\core\SQLite;

class CadastroModel{
    public static function cadastrar($usuario_cpf, $usuario_nome, $usuario_sobrenome, $usuario_senha, $usuario_email){
        $conexao = self::conectar();

        $conexao->query(
            "INSERT INTO Pescador(
                pk_cpf,
                nome,
                sobrenome,
                senha,
                email,
                fk_local
            )
            VALUES(
                :pk_cpf,
                :nome,
                :sobrenome,
                :senha,
                :email,
                1
            )",
            [
                ":pk_cpf"    => $usuario_cpf,
                ":nome"      => $usuario_nome,
                ":sobrenome" => $usuario_sobrenome,
                ":senha"     => $usuario_senha,
                ":email"     => $usuario_email                
            ]
        );

        return true;
    }

    private static function conectar(){
        return new SQLite;
    }
}

?>