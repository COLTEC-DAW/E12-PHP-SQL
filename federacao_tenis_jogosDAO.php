<?php
    include_once "federacao_tenis_jogos.php";

    class JogosDAO {

        private $conexao;
        private $tabela = "jogos";

        public function __construct($conexao) {
            $this->conexao = $conexao;
        }

        public function add($item) {

            mysqli_query($this->conexao,
                "INSERT INTO $this->tabela VALUES ("
                    . "$item->tenista_01_id, "
                    . "$item->tenista_02_id, "
                    . "$item->campeonatos_id, "
                    . "$item->publico, "
                    . "$item->pontuacao_tenista_01, "
                    . "$item->pontuacao_tenista_02, "
                    . "$item->quadras_id"
                . ");"
            );
        }

        public function get($id_campeonato, $id_tenista01, $id_tenista02) {

            $result = mysqli_query($this->conexao, ("SELECT * FROM $this->tabela WHERE campeonatos_id = $id_campeonato AND tenista_01_id = $id_tenista01 AND tenista_02_id = $id_tenista02"));
            $row = mysqli_fetch_array($result);
            $item = new Jogos(
                $row['tenista_01_id'],
                $row['tenista_02_id'],
                $row['campeonatos_id'],
                $row['publico'],
                $row['pontuacao_tenista_01'],
                $row['pontuacao_tenista_02'],
                $row['quadras_id']
            );

            return $item;
        }

        public function getAll() {
            $items = [];

            $result = mysqli_query($this->conexao, ("SELECT * FROM $this->tabela"));

            $num_items = mysqli_num_rows($result);
            for ($i = 0; $i < $num_items; $i++) {
                
                $row = mysqli_fetch_array($result);
                $item = new Jogos(
                    $row['tenista_01_id'],
                    $row['tenista_02_id'],
                    $row['campeonatos_id'],
                    $row['publico'],
                    $row['pontuacao_tenista_01'],
                    $row['pontuacao_tenista_02'],
                    $row['quadras_id']
                );
                $items[] = $item;
            }
            
            return $items;
        }

        public function getAllFromCampeonato($id_campeonato) {
            $items = [];

            $result = mysqli_query($this->conexao, ("SELECT * FROM $this->tabela WHERE campeonatos_id = $id_campeonato"));

            $num_items = mysqli_num_rows($result);
            for ($i = 0; $i < $num_items; $i++) {
                
                $row = mysqli_fetch_array($result);
                $item = new Jogos(
                    $row['tenista_01_id'],
                    $row['tenista_02_id'],
                    $row['campeonatos_id'],
                    $row['publico'],
                    $row['pontuacao_tenista_01'],
                    $row['pontuacao_tenista_02'],
                    $row['quadras_id']
                );
                $items[] = $item;
            }
            
            return $items;
        }


    }
?>