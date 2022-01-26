<?php
    include "Models/Quadra.php";
    
    class QuadraDAO{
        private $connection;

        public function __construct($conexao) {
            $this->connection = $conexao;
        }

        public function addNewTenista($new_Quadra) {
            $query = "INSERT INTO quadra VALUES (" .
                "{$new_Tenista->get_Id()}, " .
                "\"{$new_Tenista->get_Tipo()}\"," .
                "\"{$new_Tenista->get_Endereco()}\", " .
            ")";

            return mysqli_query($this->connection, $query);
        }

        public function GetAll(){
            $data = [];

            $query = "SELECT * FROM quadra;";
            $DBfeedback  = mysqli_query($this->connection, $query);

            $count = mysqli_num_rows($DBfeedback);
            for ($i=0; $i < $count; $i++) { 
                $row = mysqli_fetch_array($DBfeedback);
                $new = new Quadra($row["Id"],$row["Tipo"],$row["Endereco"]);
                $data[] = $new;
            }

            return $data;
        }
    }
?>