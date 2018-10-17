<?php

require_once "../models/Tenista.php";
require_once "../Connection.php";

class TenistaDAO {

    public static function insertTenistas(Tenistas $tenista) {
        $con = Connection::getConncetion();

        $stmt = $con->prepare("INSERT INTO tenistas(id, nome, data_nascimento, sexo, categorias_id) VALUES(?, ?, ?, ?, ?)");
        $stmt->bindParam(1, $tenista->id);
        $stmt->bindParam(2, $tenista->nome);
        $stmt->bindParam(3, $tenista->data_nascimento);
        $stmt->bindParam(4, $tenista->sexo);
        $stmt->bindParam(5, $tenista->categorias_id);
        $stmt->execute();

        return 1;
    }

    public static function getTenistas() {
        $tenistasArray = array();
        
        $con = Connection::getConnection(); 
        $stmt = $con->prepare("SELECT t.id AS `tenista_id`, t.nome AS `tenista_nome`, t.data_nascimento AS `tenista_nascimento`, t.sexo AS `tenista_sexo`, cat.nome AS `categoria_nome` 
                                FROM tenistas t INNER JOIN categorias cat ON t.categorias_id = cat.id");
        if ($stmt->execute()) {
            if ($stmt->rowCount() > 0) {
                while ($row = $stmt->fetch(PDO::FETCH_OBJ)) {
                    $sexo = Tenista::parseSexoBinary($row->tenista_sexo);

                    $tenista = new Tenista($row->tenista_id, 
                                            $row->tenista_nome,
                                            $row->tenista_nascimento,
                                            $sexo,
                                            $row->categoria_nome);

                    array_push($tenistasArray, $tenista);
                }
            }
        }

        return $tenistasArray;
    }
}

?>