<?php
    $conexao = mysqli_connect("localhost", "root", "", "nova_atividade");
    $res = mysqli_query($conexao, "SELECT * FROM jogos JOIN campeonatos ON campeonatos.id = jogos.campeonatos_id JOIN quadras ON quadras.id = jogos.quadras_id");
    mysqli_close($conexao);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E05: PHP & Banco de dados</title>
    <link rel="stylesheet" type="text/css" href="style.css" media="screen" />
</head>
<body id="jogo">
    <h1>Jogos</h1>

    <a href = "index.php">Home</a>/
    <a href="">Jogos</a>/
    <a href="cadatrosTenistas.php">Cadastrar Tenistas</a>
    <table>
    <?php
        $num = mysqli_num_rows($res);        
        for($i = 0; $i < $num; $i++){           
            $row = mysqli_fetch_array($res);
    ?>
        <tr>
            <th>Competidor 1</th>
            <th>Competidor 2</th>
            <th>Pontuação Jogador 1</th>
            <th>Pontuação Jogador 2</th>
            <th>Público</th>
            <th>Campeonato</th>
            <th>Quadra</th>
        </tr>
        <tr>
            <td><?= $row["tenista_01_id"]?></td>
            <td><?= $row["tenista_02_id"]?></td>
            <td><?= $row["pontuacao_tenista_01"]?></td>
            <td><?= $row["pontuacao_tenista_02"]?></td>
            <td><?= $row["publico"]?></td>
            <td><?= $row[8]?></td>
            <td><?= $row[13]?></td>
        </tr>

    <?php } ?>

    </table>
    <br>
    
</body>
</html>