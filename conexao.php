<?php
    class Conexao
    {
        private $host = "localhost";
        private $login = "root";
        private $senha = "";
        private $database = "federacao_tenis";

        public function getConnection()
        {
            return mysqli_connect($this->host, $this->login, $this->senha, $this->database);
        }
    }



?>