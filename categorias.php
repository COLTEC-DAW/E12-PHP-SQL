<?php
 class CategoriaDAO{

    function read(){

        $conexao = connect();
        $result = mysqli_query($conexao, "SELECT * FROM categorias");
        close($conexao);

        $categorias;
        for ($i=0; $i< mysqli_num_rows($result); $i++){
            $categorias[$i] = mysqli_fetch_object($result);
        }
        return $categorias;
    }
}
$DAO_categoria = new CategoriaDAO();
?>
