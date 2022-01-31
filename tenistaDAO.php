<?php
    include "tenista.php";

    class TenistaDAO {
        private $conexao;

        public function __construct($conexao) {
            $this->conexao = $conexao;
        }
        public function add($tenista) {
            $query = "INSERT INTO tenistas VALUES (" .
                "{$tenista->get_id()}, " .
                "\"{$tenista->get_nome()}\"," .
                "\"{$tenista->get_data_nascimento()}\", " .
                "{$tenista->get_sexo()}, " .
                "{$tenista->get_categoria()}" .
            ")";
            return mysqli_query($this->conexao, $query);
        }
        public function get_all() {
            $tenistas = [];
            $res = mysqli_query($this->conexao, "SELECT * FROM tenistas");
            $num_tenistas = mysqli_num_rows($res);
            for ($i=0; $i < $num_tenistas; $i++) { 
                $row = mysqli_fetch_array($res);
                $tenista = new Tenista(
                    $row["id"],
                    $row["nome"],
                    $row["data_nascimento"],
                    $row["sexo"],
                    $row["categorias_id"]
                );
                $tenistas[] = $tenista;
            }
            return $tenistas;
        }
    }
?>