<?php

namespace dist\controllers\core;

session_start();

class Session {
    public static function criar(int $cpf, string $nome, string $email): bool{
        $_SESSION["cpf"]   = $cpf;
        $_SESSION["nome"]  = $nome;
        $_SESSION["email"] = $email;

        return true;
    }

    public static function destruir(): bool{
        $_SESSION = array();
        session_destroy();

        return true;
    }

    public static function id(): int{
        return $_SESSION["id"];
    }

    public static function nome(): string{
        return $_SESSION["nome"];
    }

    public static function email(): string{
        return $_SESSION["email"];
    }

    public static function existe(): bool{
        return isset($_SESSION["nome"]);
    }
}

?>