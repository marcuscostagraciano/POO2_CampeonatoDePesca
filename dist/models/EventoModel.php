<?php

namespace dist\models;

use dist\models\core\SQLite;

class EventoModel{
    public static function puxarCampeonatos(){
        $conexao = self::conectar();

        return $conexao->query(
            "SELECT * FROM Campeonatos"
        );
    }

    private static function conectar(){
        return new SQLite;
    }
}

?>