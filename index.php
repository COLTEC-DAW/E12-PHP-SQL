<?php
    $conexmysql = mysqli_connect("localhost", "root", "", "federacao_tenis");

    $tipoRequisicao = $_SERVER["REQUEST_METHOD"];

    if($tipoRequisicao == "POST"){
        $nome = $_POST["nome"];
        $sexo = $_POST["sexo"];
        $data_nascimento = $_POST["data_nascimento"];
        $categorias_id = (int)$_POST["categoria"];

        mysqli_query ($conexmysql, "INSERT INTO tenistas (nome,data_nascimento,sexo,categorias_id) VALUES (" .
        "\"$nome\","."\"$data_nascimento\","."\"$sexo\" ,"."$categorias_id".")");
        }

        $resultado =  mysqli_query($conexmysql, "SELECT * FROM tenistas");
        $numeroTenistas = mysqli_num_rows($resultado);
        mysqli_close($conexmysql);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP&MYSQL</title>

</head>
<body>
    <h1>Federação Tenis</h1>
    <?php
        $i = 0;
        for($i = 0; $i < $numeroTenistas; $i++)
        {
            $dadosTenistas = mysqli_fetch_array($resultado);
    ?>
            <p>
                ID:<?= $dadosTenistas["id"]."\n"; ?><br>
                Nome:<?= $dadosTenistas["nome"]."\n"; ?><br>
                Data Nascimento:<?= $dadosTenistas["data_nascimento"]."\n"; ?><br>
                Sexo:<?= $dadosTenistas["sexo"]."\n"; ?><br>
                Categoria:<?= $dadosTenistas["categorias_id"]."\n\n"; ?><br>
                <br><br>
            </p>
    <?php
        }
    ?>

<form action="cadastroTenista.html">
<input type="submit" value="Cadastrar">
</form>
<form action="jogos.php">
<input type="submit" value="Ver Jogos">
</form>
</body>
</html>