<?php
    require "DB.php";
    require "CategoriaDao.php";
    
    if(isset($_POST["nome"])){
        require "TenistaDao.php";
        $resultado = $dao_tenista->insert($_POST["nome"], $_POST["data"], $_POST["sexo"], $_POST["categorias_id"]);
        header('Location: index.php');
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E12 - SQL+PHP</title>
</head>
<body>
    <form action="form.php" method="POST">
        <p>Nome</p>
        <input type="text" name="nome" placeholder="Nome" required><br>
        
        <p>Data de nascimento</p>
        <input type="date" name="data" required><br>
        
        <p>Categoria</p>    
        <select name="categorias_id" required>
        <?php 
            $categorias = $dao_categoria->read();
            for ($i=1; $i<=count($categorias); $i++){
                echo '<option value="'. $i .'">'. $categorias[$i-1]->nome . '</option>';
            }
        ?>
        </select><br>

        <p>Sexo</p>
        <input type="radio" name="sexo" value="1" checked> Homem
        <input type="radio" name="sexo" value="0"> Mulher<br><br>

        <input type="submit" value="Cadastrar">
    </form>

    <?php if (isset($resultado)){
        echo "Tenista cadastrado com sucesso";
    }
    ?>

    <a href="index.php">Voltar</a>
</body>
</html>