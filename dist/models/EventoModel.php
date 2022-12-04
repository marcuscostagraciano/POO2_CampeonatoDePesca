<?php

namespace dist\models;

use dist\models\core\SQLite;
use dist\controllers\core\Session;
use dist\utility\Retorno;
use Exception;

class EventoModel{
    public static function puxarCampeonatos(){
        $conexao = self::conectar();

        return $conexao->query(
            "SELECT * FROM Campeonatos"
        );
    }

    public static function inscreverEvento($id_campeonato){
        $conexao = self::conectar();

        $cod_prova = $conexao->query(
            "SELECT pk_prova FROM Prova WHERE fk_campeonato = :cod_campeonato",
            [
                ":cod_campeonato" => $id_campeonato
            ]
        );

        if(!count($cod_prova)) throw new Exception("Campeonato não possui prova");
        
        $conexao->query(
            "INSERT INTO Colocacao(
                fk_cpf,
                fk_codProva,
                posicao
            )
            VALUES(
                :cpf,
                :cod_prova,
                '1'
            )",
            [
                ":cpf"       => Session::cpf(),
                ":cod_prova" => $cod_prova[0]["pk_prova"]
            ]
        );
    }

    private static function conectar(){
        return new SQLite;
    }
}

?>