<?php

namespace dist\controllers\core;

session_start();

class Session {
    public static function criar(int $id, string $nome, string $email): void{
        $_SESSION["id"]    = $id;
        $_SESSION["nome"]  = $nome;
        $_SESSION["email"] = $email;
    }

    public static function destruir(): void{
        $_SESSION = array();
        session_destroy();
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