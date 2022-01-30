<?php

    include_once "conexao.php";

    include_once "federacao_tenis_categoriasDAO.php";
    include_once "federacao_tenis_tenistasDAO.php";
    
    if (!isset($msqli)) {
        $conexao = new Conexao("federacao_tenis");
        $msqli = $conexao->getConnection();
    }
    if (!isset($conexaoTenistas)) {
        $conexaoTenistas = new TenistasDAO($msqli);
    } 
    if (!isset($conexaoCategorias)) {
        $conexaoCategorias = new CategoriasDAO($msqli);
    }

?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="styles.css">
        <title>Tenistas</title>
    </head>
    <body>
        
        <?php include "insereTenista.php" ?>

        <h2>Lista de Tenistas</h2>
        <table class="border max-width">
            <tr>
                <th class="width-over10">ID</th>
                <th>NOME</th>
                <th class="width-over6">DATA DE NASCIMENTO</th>
                <th class="width-over10">SEXO</th>
                <th class="width-over6">CATEGORIA</th>
            </tr>
            <?php
                $tenistas = $conexaoTenistas->getAll();
                foreach ($tenistas as $tenista) {

                    $tenistaId = $tenista->get_id();
                    $tenistaNome = $tenista->get_nome();
                    $tenistaDataNascimento = $tenista->get_data_nascimento();
                    $tenistaSexo = $tenista->get_sexo();

                    $tenistaCategoria = $conexaoCategorias->get($tenista->get_categorias_id());
                    $tenistaCategoriaNome = $tenistaCategoria->get_nome();
                    ?>

                    <tr>
                        <td><?php echo "$tenistaId" ?></td>
                        <td><?php echo "$tenistaNome" ?></td>
                        <td><?php echo "$tenistaDataNascimento" ?></td>
                        <td><?php echo ($tenistaSexo == 0 ? "M" : "F") ?></td>
                        <td><?php echo "$tenistaCategoriaNome" ?></td>
                    </tr>
                    <?php
                }
            ?>
        </table>
    </body>
</html>