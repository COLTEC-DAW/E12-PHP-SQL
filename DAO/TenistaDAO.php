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

    public static function createTenista(Tenista $tenista) {
        try {
            $con = Connection::getConnection();

            $stmt = $con->prepare("INSERT INTO tenistas(id, nome, data_nascimento, sexo, categorias_id) VALUES(?,?,?,?,?)");

            // $id = $tenista->getId();
            // $stmt->bindParam(1, $id);

            // $name = $tenista->getNome();
            // $stmt->bindParam(2, $name);

            // $data_nascimento = $tenista->getDataNascimento();
            // $stmt->bindParam(3, $data_nascimento);

            // $sexo = $tenista->getSexo();
            // $stmt->bindParam(4, $sexo);

            // $categoria = $tenista->getCategoria();
            // $stmt->bindParam(5, $categoria);

            $stmt->execute([ 
                $tenista->getId(),
                $tenista->getNome(),
                $tenista->getDataNascimento(),
                $tenista->getSexo(),
                $tenista->getCategoria(),
                ]);
        } catch(PDOException $e){
            echo 'Error: ' . $e->getMessage();
        }
        
    }

    public static function getMaxId(){
        $con = Connection::getConnection();

        $stmt = $con->prepare("SELECT id FROM tenistas ORDER BY id DESC LIMIT 1");

        if($stmt->execute()) {
            if ($stmt->rowCount() > 0) {
                while ($row = $stmt->fetch(PDO::FETCH_OBJ)) {
                    return $row->id +1;
                }
            } else {
                return 1;
            }
        }
    }
}

?>