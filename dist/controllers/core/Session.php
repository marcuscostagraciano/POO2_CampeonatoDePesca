<?php

namespace dist\controllers\core;

session_start();

class Session {
    public static function criar(int $cpf, string $nome, string $email){
        $_SESSION["cpf"]   = $cpf;
        $_SESSION["nome"]  = $nome;
        $_SESSION["email"] = $email;

        return true;
    }

    public static function destruir(){
        $_SESSION = array();
        session_destroy();

        return true;
    }

    public static function cpf(){
        return $_SESSION["cpf"];
    }

    public static function nome(){
        return $_SESSION["nome"];
    }

    public static function email(){
        return $_SESSION["email"];
    }

    public static function existe(){
        return isset($_SESSION["nome"]);
    }
}

?>