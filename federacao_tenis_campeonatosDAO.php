<?php
    include_once "federacao_tenis_campeonatos.php";

    class CampeonatosDAO {

        private $conexao;
        private $tabela = "campeonatos";

        public function __construct($conexao) {
            $this->conexao = $conexao;
        }

        public function add($item) {

            mysqli_query($this->conexao,
                "INSERT INTO $this->tabela VALUES ("
                    . "$item->id, "
                    . "$item->nome, "
                    . "$item->edicao, "
                    . "$item->data_realizacao, "
                    . "$item->premiacao"
                . ");"
            );
        }

        public function getAll() {
            $items = [];

            $result = mysqli_query($this->conexao, ("SELECT * FROM $this->tabela"));

            $num_items = mysqli_num_rows($result);
            for ($i = 0; $i < $num_items; $i++) {
                
                $row = mysqli_fetch_array($result);
                $item = new Campeonatos(
                    $row['id'],
                    $row['nome'],
                    $row['edicao'],
                    $row['data_realizacao'],
                    $row['premiacao']
                );
                $items[] = $item;
            }
            
            return $items;
        }

        public function get($id) {

            $result = mysqli_query($this->conexao, ("SELECT * FROM $this->tabela WHERE id = $id"));
            $row = mysqli_fetch_array($result);
            $item = new Campeonatos(
                $row['id'],
                $row['nome'],
                $row['edicao'],
                $row['data_realizacao'],
                $row['premiacao']
            );

            return $item;
        }


    }
?>