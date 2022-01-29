<?php

    include "conexao.php";
    include "tenistaDAO.php";

    $conexao = new Conexao();
    $tenistaDAO = new TenistaDAO($conexao->get_connection());

    //manipulação dos dados
    $reqType = $_SERVER["REQUEST_METHOD"];
    $has_added = false;
    if($reqType == 'POST') {
        $novo_tenista = new Tenista(
                $id = $_POST["id"],
                $nome = $_POST["nome"],
                $data_nascimento = $_POST["data_nascimento"],
                $sexo = $_POST["sexo"],
                $categoria = $_POST["categoria"]
        );
        $has_added = $tenistaDAO->add($novo_tenista);
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
    <title>Tenistas - Federação de Tênis</title>
</head>
<body>
    <h1>Tenistas</h1>

    <?php if ($has_added){ ?>
        <p><b>Tenista cadastrado com sucesso!</b></p>
    <?php } else{ mysqli_error($conexao->get_connection()) ?>
        <p><b>Erro no cadastro. Tente novamente.</b></p>
    <?php } ?>

    <table>
        <th>ID &nbsp</th>
        <th>Nome &nbsp</th>
        <th>Data de nascimento &nbsp</th>
        <th>Sexo &nbsp</th>
        <th>Categoria &nbsp</th>
        <?php foreach ($tenistas as $tenista) { ?>
            <tr>
                <td><?= $tenista->get_id() ?></td>
                <td><?= $tenista->get_nome() ?></td>
                <td><?= date('d-m-Y', strtotime($tenista->get_data_nascimento())) ?></td>
                <td>
                    <?php
                    if ($tenista->get_sexo() == 1){
                        echo 'Male';
                    }else{
                        echo 'Female';
                    }
                    ?>
                </td>
                <td><?= $tenista->get_categoria() ?></td>
            </tr>
        <?php } ?>
    </table>
        
    <p>
        <a href="cadastroTenista.php">Novo tenista</a>
    </p>

</body>
</html>