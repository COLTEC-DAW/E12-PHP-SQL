<?php
require_once __DIR__."/../models/Tenista.php";
require_once __DIR__."/../../database/Connector.php";

class TenistaController {
    private static $lastId  = 0;

    public static function getTenistas() {
        $conn = Connection::getConnection();
        $tenistas = [];
        
        $queryString = "SELECT t.id AS `tenista_id`, t.nome AS `tenista_nome`, t.data_nascimento AS `tenista_nascimento`, t.sexo AS `tenista_sexo`, cat.nome AS `categoria_nome`
        FROM tenistas t INNER JOIN categorias cat ON t.categorias_id = cat.id";
        
        $statement = $conn->prepare($queryString);

        if ($statement->execute()) {
            if ($statement->rowCount() > 0) {
                while ($row = $statement->fetch(PDO::FETCH_OBJ)) {
                    $tenista = new Tenista($row->tenista_id, $row->tenista_nome, $row->tenista_nascimento, $row->tenista_sexo, $row->categoria_nome);
                    $tenistas[] = $tenista;
                }
            }
        }
        return $tenistas;
    }

    public static function criarTenista(Tenista $tenista) {
        $conn = Connection::getConnection();
        $queryString = "INSERT INTO tenistas(id, nome, data_nascimento, sexo, categorias_id) VALUES(?,?,?,?,?)";
        $statement = $conn->prepare($queryString);
        $statement->execute([ $tenista->getId(), $tenista->getNome(), $tenista->getDataNascimento(), $tenista->getSexo(),$tenista->getCategoria() ]);
        $lastId = $conn->lastInsertId();
    }

    public static function getLastId(){
        return self::$lastId;
    }   
}
?>