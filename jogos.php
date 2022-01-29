<?php

    include "conexao.php";
    include "jogo.php";

    $conexao = new Conexao();

    $jogos = [];
    
    $consulta = "SELECT t1.nome t1, t2.nome t2, c.nome c, j.publico, j.pontuacao_tenista_01, j.pontuacao_tenista_02, q.tipo q FROM jogos j
    JOIN tenistas t1 ON j.tenista_01_id = t1.id
    JOIN tenistas t2 ON j.tenista_02_id = t2.id
    JOIN campeonatos c ON j.campeonatos_id = c.id
    JOIN quadras q ON j.quadras_id = q.id;";

    $res = mysqli_query($conexao->get_connection(), $consulta);
    $num_jogos = mysqli_num_rows($res);

    for ($i=0; $i < $num_jogos; $i++){
        $row = mysqli_fetch_array($res);
        $novo_jogo = new Jogo(
            $row["t1"],
            $row["t2"],
            $row["c"],
            $row["publico"],
            $row["pontuacao_tenista_01"],
            $row["pontuacao_tenista_02"],
            $row["q"]
        );
        $jogos[] = $novo_jogo;
    }
    
    mysqli_close($conexao->get_connection());
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jogos - Federação de Tênis</title>
</head>
<body>
    <h1>Jogos</h1>

    <table>
        <th>Jogador 1 &nbsp</th>
        <th>Jogador 2 &nbsp</th>
        <th>Campeonato &nbsp</th>
        <th>Publico &nbsp</th>
        <th>Pontuacao - Jogador 1 &nbsp</th>
        <th>Pontuacao - Jogador 2 &nbsp</th>
        <th>Tipo de quadra &nbsp</th>

        <?php foreach ($jogos as $jogo) { ?>
            <tr>
                <td><?= $jogo->get_tenista_01_id() ?></td>
                <td><?= $jogo->get_tenista_02_id() ?></td>
                <td><?= $jogo->get_campeonatos_id() ?></td>
                <td><?= $jogo->get_publico() ?></td>
                <td><?= $jogo->get_pontuacao_tenista_01() ?></td>
                <td><?= $jogo->get_pontuacao_tenista_02() ?></td>
                <td><?= $jogo->get_quadras_id() ?></td>
            </tr>
        <?php } ?>
    </table>
        
    <p>
        <a href="signup.php">Novo usuário</a>
    </p>

</body>
</html>