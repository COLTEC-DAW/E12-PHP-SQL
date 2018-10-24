<?php
require "../models/Categoria.php";
require "../Connection.php";

class CategoriaController {
    public static function getCategorias() {
        $categoriasArray = array();

        $con = Connection::getConnection();
        $stmt = $con->prepare("SELECT id, nome FROM categorias");
        if ($stmt->execute()) {
            if ($stmt->rowCount() > 0) {
                while($row = $stmt->fetch(PDO::FETCH_OBJ)){
                    $categoria = new Categoria($row->id,
                                                $row->nome);

                    array_push($categoriasArray, $categoria);
                }
            }
        }
        return $categoriasArray;
    }
    public static function getIdCategoriaByName($name) {

        $con = Connection::getConnection();
        $stmt = $con->prepare("SELECT id FROM categorias where nome = ?");
        $stmt->bindParam(1, $name);
        if ($stmt->execute()) {
            if ($stmt->rowCount() > 0) {
                $row = $stmt->fetch(PDO::FETCH_OBJ);
                return $row->id;
            }
        }
    }
}
?>
