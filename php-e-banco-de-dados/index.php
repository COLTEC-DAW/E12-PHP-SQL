<?php

    $conexao = mysqli_connect("localhost", "root", "", "federacao_tenis");

    $resultado = mysqli_query($conexao, "SELECT * FROM tenistas");
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
        <p>
            <?php echo $row["nome"]; ?>
        </p>

    <?php } ?>
</body>
</html>