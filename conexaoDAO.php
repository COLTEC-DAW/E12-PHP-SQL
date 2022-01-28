<?php
    include "tenistas.php";
    class ConexaoDAO
    {
        private $conexao;

        public function __construct($conexao)
        {
            $this->conexao = $conexao;
        }
        public function add()
        {

        }
        public function getAll()
        {
            $tenistas = [];

            $resultado = mysqli_query($this->conexao, "SELECT * FROM tenistas");
            $numero_de_tenistas = mysqli_num_rows($resultado);
            for($i = 0; $i < $numero_de_tenistas; $i++)
            {
                $row = mysqli_fetch_array($resultado);
                $new_tenista = new Tenistas
                (
                    $row["id"],
                    $row["nome"],
                    $row["data_nascimento"],
                    $row["sexo"],
                    $row["categorias_id"]
                );

                $tenistas[] = $new_tenista;
            }
        }
    }
?>