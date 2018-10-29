<?php

 class CategoriaDao{

    function read(){
        $conexao = connect();

        $resultado = mysqli_query($conexao, "SELECT * FROM categorias");
        close($conexao);
        
        $categorias;
        for ($i=0; $i< mysqli_num_rows($resultado); $i++){
            $categorias[$i] = mysqli_fetch_object($resultado);
        }
        return $categorias;
    }
}

$dao_categoria = new CategoriaDao();

?>