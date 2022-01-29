<?php
    $conexao = mysqli_connect("localhost", "root", "", "nova_atividade" );
    $tenistas = mysqli_query ($conexao,"SELECT * FROM  tenistas");
    $quantidade_tenistas = mysqli_num_rows($tenistas);
    mysqli_close ($conexao);

?>
<!DOCTYPE html>
<html lang="en">
<head>   
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css" media="screen" />
    <title>E05: PHP & Banco de dados</title>
</head>
<body id="tenistas">
    <h1>
        Tenistas Cadastrados
    </h1>
    
    <a href = "">Home</a>/
    <a href="jogos.php">Jogos</a>/
    <a href="cadatrosTenistas.php">Cadastrar Tenistas</a>

    <table>
    <?php 
        for($i = 0; $i < $quantidade_tenistas; $i++){
            $row = mysqli_fetch_array($tenistas);   
    ?>
            <tr >
                <th>id</th>
                <th>nome</th>
                <th>data nascimento</th>
                <th>sexo</th>
                <th>cateoria</th>
            </tr>
            <tr> 
                <td><?=  $row[0] ?></td>
                <td><?=  $row[1] ?></td> 
                <td><?=  $row[2] ?></td>
                <td><?=  $row[3] ?></td> 
                <td><?=  $row[4] ?></td>   
            </tr>   
        <?php } ?>
    </table>

</body>
</html>