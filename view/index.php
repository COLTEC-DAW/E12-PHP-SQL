<?php
    require_once "../DAO/JogoDAO.php";
    require_once "../DAO/TenistaDAO.php";

    $rs_jogos = JogoDAO::getJogos();
    $rs_tenistas = TenistaDAO::getTenistas();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Federação de Tenis</title>
</head>
<body>
    <h4>Lista dos Tenistas Cadastrados</h4>
    <table>
        <th>Tenista ID</th>
        <th>Tenista Nome</th>
        <th>Data Nascimento</th>
        <th>Tenista Sexo</th>
        <th>Nome da Categoria</th>

        <?php for ($j=0; $j< count($rs_tenistas); $j++) { ?>
            <tr>
                <td> <?= $rs_tenistas[$j]->getId(); ?> </td>
                <td> <?= $rs_tenistas[$j]->getNome(); ?> </td>
                <td> <?= $rs_tenistas[$j]->getDataNascimento(); ?> </td>
                <td> <?= $rs_tenistas[$j]->getSexo(); ?> </td>
                <td> <?= $rs_tenistas[$j]->getCategoria(); ?> </td>
            </tr>
        <?php } ?>
    </table>


    <h4>Lista dos Jogos Cadastrados</h4>
    <table>
        <th>Tenista 1</th>
        <th>Tenista 2</th>
        <th>Campeonato</th>
        <th>Público</th>
        <th>Pontuação Tenista 1</th>
        <th>Pontuação Tenista 2</th>
        <th>Quadra</th>

        <?php for ($i=0; $i< count($rs_jogos); $i++) { ?>
            <tr>
                <td> <?= $rs_jogos[$i]->getTenista_01(); ?> </td>
                <td> <?= $rs_jogos[$i]->getTenista_02(); ?> </td>
                <td> <?= $rs_jogos[$i]->getCampeonato(); ?> </td>
                <td> <?= $rs_jogos[$i]->getPublico(); ?> </td>
                <td> <?= $rs_jogos[$i]->getPontuacaoTenista_01(); ?> </td>
                <td> <?= $rs_jogos[$i]->getPontuacaoTenista_02(); ?> </td>
                <td> <?= $rs_jogos[$i]->getQuadra(); ?> </td>
            </tr>
        <?php } ?>
    </table>
  

</body>
</html>