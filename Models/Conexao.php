<?php
    class Conexao{
        private $host = "localhost";
        private $login = "root";
        private $senha = "";
        private $database = "federacao_tenis";

        private $connection;

        public function __construct(){
            $this->connection = mysqli_connect($this->host, $this->login, $this->senha, $this->database);
        }

        public function get_connection() { return $this->connection; }
    }
?>