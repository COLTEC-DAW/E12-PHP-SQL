<?php 
class Conexao {

    private $host = "127.0.0.1:3306";
    private $login = "root";
    private $senha = "sql@trio1234";
    private $database = "federacao_tenis";


    public function get_connection() {
        return mysqli_connect($this->host, $this->login, $this->senha, $this->database);
    }
}
?>