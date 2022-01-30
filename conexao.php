<?php
    class Conexao {
        
        private $host = "localhost";
        private $login = "root";
        private $senha = "";
        private $database;

        public function __construct($database) {
            $this->database = $database;
        }

        public function getConnection() {
            return mysqli_connect($this->host, $this->login, $this->senha, $this->database);
        }
    }
?>