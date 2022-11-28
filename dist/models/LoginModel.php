<?php

namespace dist\models;

use dist\models\core\SQLite;

class LoginModel {
    private $conexao; 

    public static function logar(string $usuario, string $senha){
        $conexao = new SQLite;
        
        return $conexao->query(
            "SELECT

            pk_cpf,
            nome,
            email
            
            FROM pescador
            
            WHERE nome  = :nome
            AND   senha = :senha",
            [
                ":nome"  => $usuario,
                ":senha" => $senha,
            ],
            true
        );
    }
}

?>