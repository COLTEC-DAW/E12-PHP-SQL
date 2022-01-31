<?php

    include "conexao.php";
    include "jogo.php";

    $conexao = new Conexao();
    $jogos = [];
    $consulta = "SELECT t1.nome tenista1, t2.nome tenista2, c.nome camp, j.publico, j.pontuacao_tenista_01 pont_tenista1, j.pontuacao_tenista_02 pont_tenista2, q.tipo quadra FROM jogos j
    JOIN tenistas t1 ON j.tenista_01_id = t1.id
    JOIN tenistas t2 ON j.tenista_02_id = t2.id
    JOIN campeonatos c ON j.campeonatos_id = c.id
    JOIN quadras q ON j.quadras_id = q.id;";
    $res = mysqli_query($conexao->get_connection(), $consulta);
    $num_jogos = mysqli_num_rows($res);

    for ($i=0; $i < $num_jogos; $i++){
        $row = mysqli_fetch_array($res);
        $jogo = new Jogo(
            $row["tenista1"],
            $row["tenista2"],
            $row["camp"],
            $row["publico"],
            $row["pont_tenista1"],
            $row["pont_tenista2"],
            $row["quadra"]
        );
        $jogos[] = $jogo;
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
        <th>Primeiro jogador  </th>
        <th>Segundo jogador  </th>
        <th>Campeonato  </th>
        <th>Público  </th>
        <th>Pontuação - Primeiro jogador  </th>
        <th>Pontuação - Segundo jogador  </th>
        <th>Quadra  </th>
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
</body>
</html>