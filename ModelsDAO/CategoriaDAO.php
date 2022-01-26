<?php
    include 'Models/Categoria.php';

    class CategoriaDAO{
        private $connection;

        public function __construct($conexao) {
            $this->connection = $conexao;
        }

        public function addNewCategoria($new_Categoria) {
            $query = "INSERT INTO categoria VALUES (" .
                "{$new_Tenista->get_Id()}, " .
                "\"{$new_Tenista->get_Nome()}\"," .
            ")";

            return mysqli_query($this->connection, $query);
        }

        public function GetAll(){
            $data = [];

            $query = "SELECT * FROM categoria;";
            $DBfeedback  = mysqli_query($this->connection, $query);

            $count = mysqli_num_rows($DBfeedback);
            for ($i=0; $i < $count; $i++) { 
                $row = mysqli_fetch_array($DBfeedback);
                $new = new Jogo($row["Id"],$row["Nome"]);
                $data[] = $new;
            }

            return $data;
        }
    }
?>