<?php
//1. Implemente uma página para todos listar os tenistas cadastrados

    $conexao = mysqli_connect("localhost", "root", "", "E12");
    $res = mysqli_query($conexao, "SELECT * FROM tenistas JOIN categorias ON categorias.id = tenistas.categoria_id");
    mysqli_close($conexao);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tênis Club</title>
</head>
<body>
    <h1>Tenistas cadastrados</h1>

    <table border="1">
    <?php
        $num = mysqli_num_rows($res);        
        for($i = 0; $i < $num; $i++){           
            $row = mysqli_fetch_array($res);
    ?>
        <tr>
            <th>Id</th>
            <th>Nome</th>
            <th>Data de Nascimento</th>
            <th>Sexo</th>
            <th>Categoria</th>
        </tr>
        <tr>
            <td><?= $row[0]?></td>
            <td><?= $row[1]?></td>
            <td><?= $row[2]?></td>
            <td><?= $row[3]?></td>
            <td><?= $row[6]?></td>
        </tr>
    <?php } ?>
    </table>
    <br></br>
    <table border="1">
        <caption>Legenda - Sexo</caption>
        <tr>
        <th>&nbsp;</th>
        <th>Valor</th>
        </tr>
        <tr>
            <td>Feminino</td>
            <td>F</td>
        </tr>
        <tr>
            <td>Masculino</td>
            <td>M</td>
        </tr>
    </table>
    <br></br>
    <a href="Jogos.php">Ver os jogos cadastrados</a><br>
    <a href="Forms.php">Cadastrar tenista</a>
</body>
</html> 
