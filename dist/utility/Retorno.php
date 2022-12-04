<?php

namespace dist\utility;

class Retorno {
    public static function ok(array $retorno = []): void{
        $retorno["ok"] = true;
        echo json_encode($retorno);
    }

    public static function erro(string $erro): void{
        echo json_encode([
            "error" => $erro
        ]);
    }
}

?>