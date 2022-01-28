<?php
    include "conexao.php";
    include "conexaoDAO.php";
    $conexao = new Conexao();
    $conexaoDAO = new ConexaoDAO($conexao->getConnection());

    $jogos = $conexaoDAO->getAll();
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
    table, th, td 
    {
        border: 1px solid black;
    }
    </style>
    <title>E12-PHP-SQL</title>
</head>
<body>
    <h1>Federação Tenis</h1>
    <table>
        <tr>
            <th>ID tenista 01</th>
            <th>Nome tenista 01</th>
            <th>ID tenista 02</th>
            <th>Nome tenista 02</th>
            <th>ID campeonato</th>
            <th>Pontuacao tenista 01</th>
            <th>Pontuacao tenista 02</th>
            <th>ID Quadra</th>
            <th>Tipo de Quadra</th>
        </tr>
    <?php
        foreach($jogo as $jogos)
        {
    ?>
        <tr>
            <td><?= $jogo->get_tenista_01_id()?></td>
            <td><?= $jogo->get_nome1()?></td>
            <td><?= $jogo->get_tenista_02_id()?></td>
            <td><?= $jogo->get_nome2()?></td>
            <td><?= $jogo->get_campeonatos_id()?></td>
            <td><?= $jogo->get_pontuacao_tenista_01()?></td>
            <td><?= $jogo->get_pontuacao_tenista_02()?></td>
            <td><?= $jogo->get_quadras_id()?></td>
            <td><?= $jogo->get_tipoQ()?></td>
            
        </tr>
    <?php
        }
    ?>
    </table>


</body>
</html>