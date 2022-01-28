<?php
    $conexao = mysqli_connect("localhost", "root", "", "daw");
    $res = mysqli_query($conexao, "SELECT * FROM jogos JOIN campeonatos ON campeonatos.id = jogos.campeonatos_id JOIN quadras ON quadras.id = jogos.quadras_id");
    mysqli_close($conexao);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Federação de Tênis</title>
</head>
<body>
    <h1>Lista dos jogos cadastrados</h1>
    <table border="1">
    <?php
        $num = mysqli_num_rows($res);        
        for($i = 0; $i < $num; $i++){           
            $row = mysqli_fetch_array($res);
    ?>
        <tr>
            <th>Tenista 1</th>
            <th>Tenista 2</th>
            <th>Campeonato</th>
            <th>Público</th>
            <th>Pontuação do tenista 1</th>
            <th>Pontuação do tenista 2</th>
            <th>Quadra</th>
        </tr>
        <tr>
            <td><?= $row["tenista_01_id"]?></td>
            <td><?= $row["tenista_02_id"]?></td>
            <td><?= $row[8]?></td>
            <td><?= $row["publico"]?></td>
            <td><?= $row["pontuacao_tenista_01"]?></td>
            <td><?= $row["pontuacao_tenista_02"]?></td>
            <td><?= $row[13]?></td>
        </tr>
    <?php } ?>
    </table>
    <br>
    <a href = "index.php">Voltar para a página de tenistas cadastrados</a>
</body>
</html> 