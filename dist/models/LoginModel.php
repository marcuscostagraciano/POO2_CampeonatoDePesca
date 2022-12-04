<?php

namespace dist\models;

use dist\models\core\SQLite;

class LoginModel {
    private $conexao; 

    public static function logar(int $cpf, string $senha){
        $conexao = self::conectar();
        
        return $conexao->query(
            "SELECT

            pk_cpf,
            nome,
            email
            
            FROM Pescador
            
            WHERE pk_cpf = :cpf
            AND   senha  = :senha",
            [
                ":cpf"   => $cpf,
                ":senha" => $senha,
            ]
        );
    }

    private static function conectar(){
        return new SQLite;
    }
}

?>