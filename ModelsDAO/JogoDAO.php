<?php
    include 'Models/Jogo.php';

    class JogoDAO{
        private $connection;

        public function __construct($conexao) {
            $this->connection = $conexao;
        }

        public function addNewJogo($new_Jogo) {
            $query = "INSERT INTO jogo VALUES (" .
                "{$new_Tenista->get_Publico()}, " .
                "\"{$new_Tenista->get_Pontuacao_T_01()}\"," .
                "\"{$new_Tenista->get_Pontuacao_T_02()}\", " .
                "\"{$new_Tenista->get_Id_Quadra()}\", " .
                "\"{$new_Tenista->get_Id_Campeonato()}\"" .
                "\"{$new_Tenista->get_Id_Tenista_01()}\"" .
                "\"{$new_Tenista->get_Id_Tenista_02()}\"" .
            ")";

            return mysqli_query($this->connection, $query);
        }

        public function GetAll(){
            $data = [];

            $query = "SELECT * FROM jogo;";
            $DBfeedback  = mysqli_query($this->connection, $query);

            $count = mysqli_num_rows($DBfeedback);
            for ($i=0; $i < $count; $i++) { 
                $row = mysqli_fetch_array($DBfeedback);
                $new = new Jogo($row["Publico"],$row["Pontuacao_tenista_01"],$row["Pontuacao_tenista_02"],$row["Id_Quadra"],$row["Id_Campeonato"],$row["Id_Tenista_01"],$row["Id_Tenista_02"]);
                $data[] = $new;
            }

            return $data;
        }

        public function GetAllFormated(){
            $str = [];    

            $query = "SELECT jogo.Publico,jogo.Id_Campeonato, quadra.Tipo, quadra.Endereco, 
            Tenista01.Nome, Pontuacao_tenista_01, Tenista02.Nome, Pontuacao_tenista_02 FROM jogo
            JOIN tenista Tenista01 ON Tenista01.Id = jogo.Id_Tenista_01
            JOIN tenista Tenista02 ON Tenista02.Id = jogo.Id_Tenista_02
            JOIN quadra ON quadra.Id = jogo.Id_Quadra;";
            
            $DBfeedback  = mysqli_query($this->connection, $query);
            
            $count = mysqli_num_rows($DBfeedback);
            for ($i=0; $i < $count; $i++) { 
                $row = mysqli_fetch_array($DBfeedback);
                
                $aux = 
                "<div class=\"JogoShow\"> 
                Dados de um jogo:</br>
                Publico: {$row[0]}</br>
                Campeonato Id: {$row[1]}</br></br>
                
                Informações da quadra:</br>
                Tipo: {$row[2]}</br>
                Endereco: {$row[3]}</br></br>
                
                Jogadores:</br> 
                Tenista 01:</br>
                Nome: {$row[4]}</br>
                Pontuação:{$row[5]}</br></br>
                
                Tenista 02 :</br>
                Nome: {$row[6]}</br>
                Pontuação: {$row[7]}</br>
                </div>";

                $str[] = $aux;
            }

            return $str;
        }
    }
?>