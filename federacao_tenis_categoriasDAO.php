<?php
    include_once "federacao_tenis_categorias.php";

    class CategoriasDAO {

        private $conexao;
        private $tabela = "categorias";

        public function __construct($conexao) {
            $this->conexao = $conexao;
        }

        public function add($item) {

            mysqli_query($this->conexao,
                "INSERT INTO $this->tabela VALUES ("
                    . "$item->id, "
                    . "$item->nome"
                . ");
            ");
        }

        public function getAll() {
            $items = [];

            $result = mysqli_query($this->conexao, ("SELECT * FROM $this->tabela"));

            $num_items = mysqli_num_rows($result);
            for ($i = 0; $i < $num_items; $i++) {
                
                $row = mysqli_fetch_array($result);
                $item = new Categorias(
                    $row['id'],
                    $row['nome']
                );
                $items[] = $item;
            }
            
            return $items;
        }

        public function get($id) {

            $result = mysqli_query($this->conexao, ("SELECT * FROM $this->tabela WHERE id = $id"));
            $row = mysqli_fetch_array($result);
            $item = new Categorias(
                $row['id'],
                $row['nome']
            );

            return $item;
        }


    }
?>