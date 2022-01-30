<?php
    include_once "federacao_tenis_tenistas.php";

    class TenistasDAO {

        private $conexao;
        private $tabela = "tenistas";

        public function __construct($conexao) {
            $this->conexao = $conexao;
        }

        public function add($item) {

            $itemId = $item->get_id();
            var_dump($itemId);
            $itemNome = $item->get_nome();
            var_dump($itemNome);
            $itemDataNascimento = $item->get_data_nascimento();
            var_dump($itemDataNascimento);
            $itemSexo = $item->get_sexo();
            var_dump($itemSexo);
            $itemCategoriasId = $item->get_categorias_id();
            var_dump($itemCategoriasId);

            mysqli_query($this->conexao,
                "INSERT INTO $this->tabela (nome, data_nascimento, sexo, categorias_id) VALUES ("
                    . "\"$itemNome\", "
                    . "'$itemDataNascimento', "
                    . "$itemSexo, "
                    . "$itemCategoriasId"
                . ");"
            );
        }

        public function getAll() {
            $items = [];

            $result = mysqli_query($this->conexao, ("SELECT * FROM $this->tabela"));

            $num_items = mysqli_num_rows($result);
            for ($i = 0; $i < $num_items; $i++) {
                
                $row = mysqli_fetch_array($result);
                $item = new Tenistas(
                    $row['id'],
                    $row['nome'],
                    $row['data_nascimento'],
                    $row['sexo'],
                    $row['categorias_id']
                );
                $items[] = $item;
            }
            
            return $items;
        }

        public function get($id) {

            $result = mysqli_query($this->conexao, ("SELECT * FROM $this->tabela WHERE id = $id"));
            $row = mysqli_fetch_array($result);
            $item = new Tenistas(
                $row['id'],
                $row['nome'],
                $row['data_nascimento'],
                $row['sexo'],
                $row['categorias_id']
            );

            return $item;
        }


    }
?>