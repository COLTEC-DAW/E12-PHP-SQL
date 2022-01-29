<?php
require_once __DIR__."/../models/Categoria.php";
require_once __DIR__."/../../database/Connector.php";

class CategoriaController {
    public static function getCategorias() {
        $conn = Connection::getConnection();
        $categorias = [];

        $queryString = "SELECT id, nome FROM categorias";
        $statement = $conn->prepare($queryString);

        if ($statement ->execute()) {
            if ($statement ->rowCount() > 0) {
                while($row = $statement ->fetch(PDO::FETCH_OBJ)){
                $categoria = new Categoria($row->id, $row->nome);
                   $categorias[] = $categoria;
                }
            }
        }
        return $categorias;
    }
}
?>