<?php
    /*Includes*/
    include "conexao.php";

    /*Conexões*/
    $conexao = new Conexao();

    /*Manipulação de Dados*/
    $reqType = $_SERVER["REQUEST_METHOD"];
    $res_insert = false;

    /*Insere Tenista caso tipo POST*/
    if($reqType == 'POST') {

        $nome =$_POST["nome"];
        $data_nasimento =$_POST["data_nascimento"];
        $sexo =$_POST["sexo"];
        $categorias_id =$_POST["categorias"];

        $res_insert = mysqli_query($conexao->get_connection(), "INSERT INTO tenistas VALUES (
        \"$nome\", 
        \"$data_nasimento\", 
        \"$sexo\",
        \"$categorias_id\")");
    }
    
    /*Seleiciona Tabelas*/
    
    $tab_tenistas = mysqli_query($conexao->get_connection(), "SELECT * FROM tenistas");
    $num_tenistas = mysqli_num_rows($tab_tenistas);

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

    <?php if ($res_insert) 
    { ?>
        <h1>Tenista Cadastrado</h1>
    <?php } ?>

    <h2>Tabela Tenistas</h2>
    <table>
        <?php 
            for($i = 0; $i < $num_tenistas; $i++) { 
            $row = mysqli_fetch_array($tab_tenistas);
        ?>
            <tr>
                <td><?= $row["id"] ?></td>
                <td><?= $row["nome"] ?></td>
                <td><?= $row["data_nascimento"] ?></td>
                <td><?= $row["sexo"] ?></td>
                <td><?= $row["categorias_id"] ?></td>
            </tr>
        <?php } ?>
    </table>

    <p>
        <a href="cadastro.php">Novo Tenista</a>
        <a href="lista_jogos.php">Lista Jogos</a>
    </p>
</body>
</html>