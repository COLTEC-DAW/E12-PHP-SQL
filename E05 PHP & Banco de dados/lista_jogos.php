<?php
    /*Includes*/
    include "conexao.php";

    /*Conexões*/
    $conexao = new Conexao();

    /*Seleiciona Tabelas*/
    
    $tab_jogos = mysqli_query($conexao->get_connection(), 
        "SELECT t1.nome AS tenista_01_id, t2.nome AS tenista_02_id, c.nome AS campeonatos_id, j.publico, j.pontuacao_tenista_01, j.pontuacao_tenista_02, q.tipo AS quadras_id
        FROM jogos j
        JOIN tenistas t1 ON j.tenista_01_id = t1.id
        JOIN tenistas t2 ON j.tenista_02_id = t2.id
        JOIN campeonatos c ON j.campeonatos_id = c.id
        JOIN quadras q ON j.quadras_id = q.id;");
    $num_jogos = mysqli_num_rows($tab_jogos);

    mysqli_close ($conexao->get_connection());

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E05 : PHP & Banco de Dados</title>
</head>
<body>
    <h1>PHP & Banco de Dados</h1>

    <h2>Tabela Jogos</h2>
    <table>
        <?php 
            for($i = 0; $i < $num_jogos; $i++) { 
            $row = mysqli_fetch_array($tab_jogos);
        ?>
            <tr>
                <td><?= $row["tenista_01_id"] ?></td>
                <td><?= $row["tenista_02_id"] ?></td>
                <td><?= $row["campeonatos_id"] ?></td>
                <td><?= $row["pontuacao_tenista_01"] ?></td>
                <td><?= $row["pontuacao_tenista_02"] ?></td>
                <td><?= $row["quadras_id"] ?></td>
            </tr>
        <?php } ?>
    </table>

    <p>
        <a href="index.php">Home</a>
    </p>
</body>
</html>