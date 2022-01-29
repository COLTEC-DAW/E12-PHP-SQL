<?php

    $conexao = mysqli_connect("localhost", "root", "", "E12");
    $result = mysqli_query($conexao, "SELECT * FROM tenistas");
    $numero_de_tenistas = mysqli_num_rows($result);
    mysqli_close($conexao);

?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP-SQL</title>

</head>

<body>

    <h1>Tênis Club</h1>

    <?php
        for($i = 0; $i < $numero_de_tenistas; $i++)
        {
            $row = mysqli_fetch_array($result);
    ?>
            <p>
                id: <?= $row["id"]; ?> 
                Nome: <?= $row["nome"]; ?> 
                Nascimento: <?= $row["data_nascimento"]; ?> 
                sexo: <?= $row["sexo"]; ?> 
                Categoria: <?= $row["categorias_id"]; ?> 
            </p>
    <?php
        }
    ?>

    <button><a href = "Jogos.php">Ver resultado dos jogos</a></button><br><br>
    <button><a href = "Forms.php">Adiconar Tenista</a></button>

</body>
