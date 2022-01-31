<?php

    include "conexao.php";
    include "tenistaDAO.php";

    $conexao = new Conexao();
    $tenistaDAO = new TenistaDAO($conexao->get_connection());
    $reqType = $_SERVER["REQUEST_METHOD"];
    $has_added = false;
    if($reqType == 'POST') {
        $tenista = new Tenista(
                $id = $_POST["id"],
                $nome = $_POST["nome"],
                $data_nascimento = $_POST["data_nascimento"],
                $sexo = $_POST["sexo"],
                $categoria = $_POST["categoria"]
        );
        $has_added = $tenistaDAO->add($tenista);
    }

    $tenistas = $tenistaDAO->get_all();
    mysqli_close($conexao->get_connection());
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de tenistas - Federação de Tênis</title>
</head>
<body>
    <h1>Lista de tenistas cadastrados na Federação de Tênis</h1>
    <?php if ($has_added){ ?>
        <p><b>Tenista cadastrado.</b></p>
    <?php } ?>

    <table>
        <th>ID  </th>
        <th>Nome  </th>
        <th>Data de nascimento  </th>
        <th>Sexo  </th>
        <th>Categoria  </th>
        <?php foreach ($tenistas as $tenista) { ?>
            <tr>
                <td><?= $tenista->get_id() ?></td>
                <td><?= $tenista->get_nome() ?></td>
                <td><?= $tenista->get_data_nascimento() ?></td>
                <td>
                    <?php
                    if ($tenista->get_sexo() == 1) echo 'Masculino';
                    else echo 'Feminino';
                    ?>
                </td>
                <td><?= $tenista->get_categoria() ?></td>
            </tr>
        <?php } ?>
    </table>
    <p>
        <a href="signUp.php">Clique aqui para cadastrar um novo tenista</a>
    </p>
</body>
</html>