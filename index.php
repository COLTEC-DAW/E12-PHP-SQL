<?php
    require "BD.php";
    require "tenistas.php";
    require "jogos.php";
    $result_tenista = $DAO_tenista->read();
    $result_jogo = $DAO_jogo->read();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SQL & PHP</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <a href="form.php">Cadastrar novo tenista</a><br>
    <h3>Lista de tenistas cadastrados</h3>
    <table>
        <th>Nome</th>
        <th>Data de nascimento</th>
        <th>Sexo</th>
        <th>Categoria</th>
        <?php for ($i=0; $i< count($result_tenista); $i++) { ?>
            <tr>
                <td> <?= $result_tenista[$i]->nome; ?> </td>
                <td> <?= date('d-m-Y', strtotime($result_tenista[$i]->data_nascimento)) ?> </td>
                <td>
                    <?php if ($result_tenista[$i]->sexo == 1){
                            echo 'Male';
                        }else{
                            echo 'Female';
                        }
                    ?>
                </td>
                <td> <?= $result_tenista[$i]->categoria; ?> </td>
            </tr>
        <?php } ?>
    </table>
    <h3>Lista de jogos cadastrados</h3>
    <table>
            <th>Tenista 1</th>
            <th>Tenista 2</th>
            <th>Campeonato</th>
            <th>Público</th>
            <th>Pontuação Tenista 1</th>
            <th>Pontuação Tenista 2</th>
            <th>Quadra</th>
        <?php for ($i=0; $i< count($result_jogo); $i++) { ?>
            <tr>
                <td> <?= $result_jogo[$i]->campeonato; ?> </td>
                <td> <?= $result_jogo[$i]->publico; ?> </td>
                <td> <?= $result_jogo[$i]->tenista1; ?> </td>
                <td> <?= $result_jogo[$i]->tenista2; ?> </td>
                <td> <?= $result_jogo[$i]->tipo_quadra; ?> </td>
                <td> <?= $result_jogo[$i]->pontuacao_tenista_01; ?> </td>
                <td> <?= $result_jogo[$i]->pontuacao_tenista_02; ?> </td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>
