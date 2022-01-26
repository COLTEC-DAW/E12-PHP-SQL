<?php
    include 'Models/Campeonato.php';

    class CampeonatoDAO{
        private $connection;

        public function __construct($conexao) {
            $this->connection = $conexao;
        }

        public function addNewCampeonato($new_Campeonato) {
            $query = "INSERT INTO campeonato VALUES (" .
                "{$new_Tenista->get_Id()}, " .
                "\"{$new_Tenista->get_Nome()}\"," .
                "\"{$new_Tenista->get_Edicao()}\", " .
                "\"{$new_Tenista->get_DataRealizacao()}\", " .
                "\"{$new_Tenista->get_Premiacao()}\"" .
            ")";

            return mysqli_query($this->connection, $query);
        }

        public function GetAll(){
            $data = [];

            $query = "SELECT * FROM campeonato;";
            $DBfeedback  = mysqli_query($this->connection, $query);

            $count = mysqli_num_rows($DBfeedback);
            for ($i=0; $i < $count; $i++) { 
                $row = mysqli_fetch_array($DBfeedback);
                $new = new Campeonato($row["Id"],$row["Nome"],$row["Edicao"],$row["Data_realizacao"],$row["Premiacao"]);
                $data[] = $new;
            }

            return $data;
        }
    }
?>