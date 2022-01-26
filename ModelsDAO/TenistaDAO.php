<?php
    include 'Models/Tenista.php';

    class TenistaDAO{
        private $connection;

        public function __construct($conexao) {
            $this->connection = $conexao;
        }

        public function addNewTenista($new_Tenista) {
            $query = "INSERT INTO tenista VALUES (" .
                "{$new_Tenista->get_Id()}, " .
                "\"{$new_Tenista->get_Nome()}\"," .
                "\"{$new_Tenista->get_DataNascimento()}\", " .
                "\"{$new_Tenista->get_Sexo()}\", " .
                "\"{$new_Tenista->get_Id_Categoria()}\"" .
            ")";

            return mysqli_query($this->connection, $query);
        }

        public function GetAll(){
            $data = [];

            $query = "SELECT * FROM tenista;";
            $DBfeedback  = mysqli_query($this->connection, $query);

            $count = mysqli_num_rows($DBfeedback);
            for ($i=0; $i < $count; $i++) { 
                $row = mysqli_fetch_array($DBfeedback);
                $new = new Tenista($row["Id"],$row["Nome"],$row["Data_nascimento"],$row["Sexo"],$row["Id_Categoria"]);
                $data[] = $new;
            }

            return $data;
        }
    }
?>