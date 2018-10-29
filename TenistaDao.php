<?php

 class TenistaDao{
    var $table = "tenistas";


    function insert($nome, $data_nascimento, $sexo, $categorias_id){
        $conexao = connect();
        $resultado = mysqli_query($conexao, "INSERT INTO " . $this->table . "(nome, data_nascimento, sexo, categorias_id) VALUES (\"". $nome ."\", \"". $data_nascimento . "\", " . $sexo . ", " . $categorias_id . ");");
        close($conexao);

        return $resultado;
    }


    function read(){
        $conexao = connect();

        $resultado = mysqli_query($conexao, "SELECT t.*, c.nome categoria FROM tenistas t JOIN categorias c ON t.categorias_id = c.id;");
        close($conexao);
        
        $tenistas;
        for ($i=0; $i< mysqli_num_rows($resultado); $i++){ 
            $tenistas[$i] = mysqli_fetch_object($resultado);
        }
        return $tenistas;
    }
}

$dao_tenista = new TenistaDao();

?>