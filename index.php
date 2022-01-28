<?php

    $conexao = mysqli_connect("localhost", "root", "", "federacao_tenis");
    $resultado = mysqli_query($conexao, "SELECT * FROM tenistas");
    $numero_de_tenistas = mysqli_num_rows($resultado);
    mysqli_close($conexao);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E12-PHP-SQL</title>
</head>
<body>
    <h1>Federação Tenis</h1>
    <?php
        for($i = 0; $i < $numero_de_tenistas; $i++)
        {
            $row = mysqli_fetch_array($resultado);
    ?>
            <p>
                <?= $row["id"]."\n"; ?>
                <?= $row["nome"]."\n"; ?>
                <?= $row["data_nascimento"]."\n"; ?>
                <?= $row["sexo"]."\n"; ?>
                <?= $row["categorias_id"]."\n"; ?>
            </p>
    <?php
        }
    ?>


</body>
</html>