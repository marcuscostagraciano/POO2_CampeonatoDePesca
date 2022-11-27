<?php

namespace dist\models\core;

use Exception;
use PDO;

class SQLite {
    private $conexao;

    public function __construct(){
        $this->conexao = new PDO("sqlite:/src/sqlite/pesca.db"); // Cria conexao com o banco
    }

    public function query(string $sql, array $parametros, bool $fetchAll = true, bool $debug = false): array{
        $query = $this->conexao->prepare($sql); // Prepara o sql

        // Verifica se houve erros na execução.
        // Se $debug for verdadeiro ele retorna a mensagem de erro do SQL.
        // Se for falso ele retorna "Houve um erro ao acessar o banco.".
        if(!($query->execute($parametros))) throw new Exception(
            $debug
            ? join(" :: ", $query->errorInfo())
            : "Houve um erro ao acessar o banco."
        );

        // Retorna o(s) resultado(s) do sql executado
        return $fetchAll
        ? $query->fetchAll(PDO::FETCH_ASSOC)
        : $query->fetch(PDO::FETCH_ASSOC);
    }

    public function fecharConexao(){
        $this->conexao = null;
    }
}

?>