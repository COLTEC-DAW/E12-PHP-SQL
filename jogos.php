<?php
    require 'tenista.php';
    require 'jogo.php';

    $conexao = mysqli_connect("localhost", "root", "", "federacao_tenis");

    //Cadastro
    //Selecao
    $resultado = mysqli_query($conexao, "SELECT jogos.pontuacao_tenista_01, jogos.pontuacao_tenista_02, jogos.publico,tenistas.nome AS t_nome, tenistas.data_nascimento, tenistas.genero, categorias.nome AS cat_nome ,campeonatos.nome AS c_nome, campeonatos.data_realizacao ,quadras.endereco, quadras.tipo FROM jogos 
    JOIN quadras ON jogos.quadras_id = quadras.id
    JOIN campeonatos ON jogos.campeonatos_id = campeonatos.id
    JOIN tenistas ON jogos.tenista_01_id = tenistas.id OR jogos.tenista_02_id = tenistas.id
    JOIN categorias ON tenistas.categorias_id = categorias.id;");
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
        <h2>Jogos Anteriores:</h2>

        <ul id='main-list'>
            <?php
                for ($i = 0; $i < $num; $i += 2){
                    $row = mysqli_fetch_array($resultado);
                    $tenista_01 = new Tenista($row["t_nome"],$row["data_nascimento"],$row["genero"],$row["cat_nome"]);
                    $row = mysqli_fetch_array($resultado);
                    $tenista_02 = new Tenista($row["t_nome"],$row["data_nascimento"],$row["genero"],$row["cat_nome"]);
                    $jogo = new Jogo($tenista_01, $tenista_02, $row["pontuacao_tenista_01"], $row["pontuacao_tenista_02"], $row["c_nome"], $row["data_realizacao"], $row["endereco"], $row["tipo"], $row["publico"]);
                    $jogo->echoJogo();   
                }
            ?>
        </ul>
    </div>
</body>
</html>