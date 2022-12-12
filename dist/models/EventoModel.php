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
            "SELECT 
            
            cam.*
            
            FROM Campeonatos cam
            
            LEFT JOIN Prova pro
            ON pro.fk_campeonato = cam.pk_campeonato
            
            LEFT JOIN Colocacao col
            ON  col.fk_codProva = pro.pk_prova
            AND col.fk_cpf      <> :cpf",
            [
                ":cpf" => Session::cpf()
            ]
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

    public static function verificarEvento($id_campeonato){
        $conexao = self::conectar();

        return $conexao->query(
            "SELECT COUNT(*)

            FROM Colocacao
            
            WHERE fk_cpf      = :cpf
            AND   fk_codProva = (
                SELECT pk_prova
                FROM Prova
                WHERE fk_campeonato = :cod_campeonato
            )",
            [
                ":cpf"            => Session::cpf(),
                ":cod_campeonato" => $id_campeonato
            ]
        ) > 0;
    }

    private static function conectar(){
        return new SQLite;
    }
}

?>