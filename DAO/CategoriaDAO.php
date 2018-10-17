<?php

require_once "../models/Categoria.php";
require_once "../Connection.php";

class TenistaDAO {

    public static function getCategorias() {
        $categoriasArray = [];
        
        $con = Connection::getConnection(); 
        $stmt = $con->prepare("SELECT id, nome FROM categorias");
        if ($stmt->execute()) {
            if ($stmt->rowCount() > 0) {
                $row = $stmt->fetch(PDO::FETCH_OBJ);

                $categoriasArray = new Categoria($row->id, 
                                            $row->nome);
            }
        }

        return $categoriasArray;
    }
}

?>