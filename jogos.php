<?php

    $conexao = mysqli_connect("localhost", "root", "", "tenisdosamigos");
    $result = mysqli_query($conexao, "SELECT * FROM jogos JOIN campeonatos ON campeonatos.id = jogos.campeonatos_id JOIN quadras ON quadras.id = jogos.quadras_id");
    mysqli_close($conexao);

?>
<!DOCTYPE html>
<html>
    <head>

        <title>Tenis dos amigos</title>

    </head>

    <body>

        <h1>Jogos</h1>

        <table border="1">

        <?php
            $num = mysqli_num_rows($result);        
            for($i = 0; $i < $num; $i++){           
                $row = mysqli_fetch_array($result);
        ?>
            <tr>

                <th>
                    Jogador 01
                </th>

                <th>
                    Jogador 02
                </th>

                <th>
                    Campeonato
                </th>

                <th>
                    Público
                </th>

                <th>
                    Pontos jogador 01
                </th>

                <th>
                    Pontuação jogador 02
                </th>

                <th>
                    Quadra
                </th>

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

        <a href = "index.php">Página de tenistas cadastradas</a>

    </body>

</html>  