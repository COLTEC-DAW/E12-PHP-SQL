<?php
class Conexao {

    private $host = "localhost";
    private $login = "root";
    private $senha = "";
    private $database = "ex_05";

    public function get_connection() {
        return mysqli_connect($this->host, $this->login, $this->senha, $this->database);
    }
}
?>