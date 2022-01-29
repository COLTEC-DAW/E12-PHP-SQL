<?php
    include "tenista.php";

    class TenistaDAO {

        private $conexao;

        public function __construct($conexao) {
            $this->conexao = $conexao;
        }


        public function add($novo_tenista) {
            $query = "INSERT INTO tenistas VALUES (" .
                "{$novo_tenista->get_id()}, " .
                "\"{$novo_tenista->get_nome()}\"," .
                "\"{$novo_tenista->get_data_nascimento()}\", " .
                "{$novo_tenista->get_sexo()}, " .
                "{$novo_tenista->get_categoria()}" .
            ")";

            return mysqli_query($this->conexao, $query);
        }

        public function get_all() {
            $tenistas = [];
            
            $res = mysqli_query($this->conexao, "SELECT * FROM tenistas");
            $num_tenistas = mysqli_num_rows($res);
            for ($i=0; $i < $num_tenistas; $i++) { 
                $row = mysqli_fetch_array($res);
                $novo_tenista = new Tenista(
                    $row["id"],
                    $row["nome"],
                    $row["data_nascimento"],
                    $row["sexo"],
                    $row["categorias_id"]
                );

                // empilhar usuário na lista
                $tenistas[] = $novo_tenista;
            }
            return $tenistas;
        }
    }
?>