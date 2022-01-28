<?php
    include "conexao.php";
    include "conexaoDAO.php";
    $conexao = new Conexao();
    $conexaoDAO = new ConexaoDAO($conexao->getConnection());

    $tenistas = $conexaoDAO->getAll();
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E12-PHP-SQL</title>
</head>
<body>
    <h1>Federação Tenis</h1>
    <?php
        foreach($tenista as $tenistas)
        {
    ?>
            <p>
                <?= $tenista->get_id()?>
                <?= $tenista->get_nome()?>
                <?= $tenista->get_data_nascimento()?>
                <?= $tenista->get_sexo()?>
                <?= $tenista->get_categorias_id()?>
            </p>
    <?php
        }
    ?>


</body>
</html>