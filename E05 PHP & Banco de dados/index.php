<?php
    /*Includes*/
    include "conexao.php";

    /*Conexões*/
    $conexao = new Conexao();

    /*Manipulação de Dados*/
    $reqType = $_SERVER["REQUEST_METHOD"];

    if($reqType == 'POST') {

        $nome =$_POST["nome"];
        $data_nasimento =$_POST["data_nascimento"];
        $sexo =$_POST["sexo"];
        $categorias_id =$_POST["categorias"];

        $querry = "INSERT INTO tenistas VALUES (".
            "\"$nome\",". 
            "\"$data_nasimento\",". 
            "$sexo,".
            "$categorias_id".
        ")";
        
        $tab_insert = mysqli_querry($conexao, $querry);
    }
    
    $tab = mysqli_query($conexao, "SELECT * FROM tenistas");
    $num_tenistas = mysqli_num_rows($tab);

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

    <h2>Tabela Tenistas</h2>
    <table>
        <?php 
            for($i = 0; $i < $num_tenistas; $num_tenistas++) { 
            $row = mysqli_fetch_array($tab);
        ?>
            <tr>
                <td><?= $row["id"] ?></td>
                <td><?= $row["nome"] ?></td>
                <td><?= $row["data_nascimento"] ?></td>
                <td><?= $row["sexo"] ?></td>
                <td><?= $row["categorias"] ?></td>
            </tr>
        <?php } ?>
    </table>

    <p>
        <a href="cadastro.php">Novo Tenista</a>
    </p>
</body>
</html>