<?php
// Implemente uma página para todos listar os jogos cadastrados (deverão ser exibidos informações a respeito dos tenistas 
    $conexao = mysqli_connect("localhost", "root", "", "E12");
    $res = mysqli_query($conexao, "SELECT * FROM jogos JOIN campeonatos ON campeonatos.id = jogos.campeonatos_id JOIN quadras ON quadras.id = jogos.quadras_id");
    mysqli_close($conexao);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tênis Club</title>
</head>
<body>
    <h1>Jogos cadastrados</h1>
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
            <td><?= $row["tenista1_id"]?></td>
            <td><?= $row["tenista2_id"]?></td>
            <td><?= $row[8]?></td>
            <td><?= $row["publico"]?></td>
            <td><?= $row["pontuacao_tenista1"]?></td>
            <td><?= $row["ponutacao_tenista2"]?></td>
            <td><?= $row[13]?></td>
        </tr>
    <?php } ?>
    </table>
    <br>
    <a href = "Tenistas.php">Voltar para a página de tenistas cadastrados</a>
</body>
</html> 