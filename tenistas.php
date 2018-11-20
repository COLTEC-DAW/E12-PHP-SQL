<?php
 class TenistaDAO{
    var $table = "tenistas";
    function insert($nome, $data_nascimento, $sexo, $categorias_id){
        $conexao = connect();
        $result = mysqli_query($conexao, "INSERT INTO " . $this->table . "(nome, data_nascimento, sexo, categorias_id) VALUES (\"". $nome ."\", \"". $data_nascimento . "\", " . $sexo . ", " . $categorias_id . ");");
        close($conexao);
        return $result;
    }
    function read(){
        $conexao = connect();
        $result = mysqli_query($conexao, "SELECT t.*, c.nome categoria FROM tenistas t JOIN categorias c ON t.categorias_id = c.id;");
        close($conexao);

        $tenistas;
        for ($i=0; $i< mysqli_num_rows($result); $i++){
            $tenistas[$i] = mysqli_fetch_object($result);
        }
        return $tenistas;
    }
}
$DAO_tenista = new TenistaDAO();
?>
