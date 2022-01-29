<?php
    require 'tenista.php';

    $conexao = mysqli_connect("localhost", "root", "", "federacao_tenis");

    //Cadastro
    $reqType = $_SERVER["REQUEST_METHOD"];
    if($reqType == 'POST'){

        $nome = $_POST["nome"];
        $genero = $_POST["genero"];
        $data_nasc = $_POST["data_nasc"];
        $cat = $_POST["categoria"];
        $res_insert = mysqli_query($conexao, "INSERT INTO tenistas (nome,data_nascimento,genero,categorias_id) VALUES ("."\"$nome\", "."\"$data_nasc\", "."$genero, "."$cat".")");
        header('location: teste.php');
    }
    //Selecao
    $resultado = mysqli_query($conexao, "SELECT tenistas.nome, tenistas.data_nascimento, tenistas.genero, categorias.nome AS categoria_nome FROM tenistas JOIN categorias ON tenistas.categorias_id = categorias.id");
    $num = mysqli_num_rows($resultado);

    mysqli_close($conexao);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet" type="text/css">
    <title>Home|Federação Tênis</title>
</head>
<body>
    <div class="container">
        <?php require 'header.inc'?>
        <h2>Jogadores que competem em nossos jogos:</h2>

        <ul id='main-list'>
            <?php
                for ($i = 0; $i < $num; $i ++){
                    $row = mysqli_fetch_array($resultado);
                    $tenista = new Tenista($row["nome"],$row["data_nascimento"],$row["genero"],$row["categoria_nome"]);
                    $tenista->echoTenista();   
                }
            ?>
        </ul>
    </div>
</body>
</html>