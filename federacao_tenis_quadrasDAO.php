<?php
    include_once "federacao_tenis_quadras.php";

    class QuadrasDAO {

        private $conexao;
        private $tabela = "quadras";

        public function __construct($conexao) {
            $this->conexao = $conexao;
        }

        public function add($item) {

            mysqli_query($this->conexao,
                "INSERT INTO $this->tabela VALUES ("
                    . "$item->id, "
                    . "$item->tipo, "
                    . "$item->endereco"
                . ");"
            );
        }

        public function getAll() {
            $items = [];

            $result = mysqli_query($this->conexao, ("SELECT * FROM $this->tabela"));

            $num_items = mysqli_num_rows($result);
            for ($i = 0; $i < $num_items; $i++) {
                
                $row = mysqli_fetch_array($result);
                $item = new Quadras(
                    $row['id'],
                    $row['tipo'],
                    $row['endereco']
                );
                $items[] = $item;
            }
            
            return $items;
        }

        public function get($id) {

            $result = mysqli_query($this->conexao, ("SELECT * FROM $this->tabela WHERE id = $id"));
            $row = mysqli_fetch_array($result);
            $item = new Quadras(
                $row['id'],
                $row['tipo'],
                $row['endereco']
            );

            return $item;
        }


    }
?>