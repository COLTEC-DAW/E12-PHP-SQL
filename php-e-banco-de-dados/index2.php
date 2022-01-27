<?php

    $conexao = mysqli_connect("localhost", "root", "", "federacao_tenis");

    $resultado = mysqli_query($conexao, "SELECT * FROM jogos JOIN quadras ON quadras_id = tenista_01_id JOIN tenistas ON id = categorias_id");
    $num_tenistas = mysqli_num_rows($resultado);

    mysqli_close($conexao);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Php e Banco de Dados</title>
</head>
<body>
    <h1>Federacao_Tenis</h1>
    <?php
    
    for($i = 0; $i < $num_tenistas; $i++) {
    $row = mysqli_fetch_array($resultado);
    ?>
        <tr>
            <td><?= $row["tenista_01_id"] ?></td>
            <td><?= $row["nome"] ?></td>
            <td><?= $row["data_nascimento"] ?></td>
            <td><?= $row["sexo"] ?></td>
            <td><?= $row["tenista_02_id"] ?></td>
            <td><?= $row["campeonatos_id"] ?></td>
            <td><?= $row["publico"] ?></td>
            <td><?= $row["pontuacao_tenista_01"] ?></td>
            <td><?= $row["pontuacao_tenista_02"] ?></td>
            <td><?= $row["quadras_id"] ?></td> <br>
        </tr>

    <?php } ?>
</body>
</html>