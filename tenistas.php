<?php
    $conexao = mysqli_connect("localhost", "root", "", "federacao_tenis");
    $res = mysqli_query($conexao, "SELECT * FROM tenistas JOIN categorias ON categorias.id = tenistas.categorias_id");
    mysqli_close($conexao);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Federação de Tênis</title>
</head>
<body>
    <h1>Lista dos tenistas cadastrados</h1>

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
            <td>1</td>
        </tr>
        <tr>
            <td>Masculino</td>
            <td>0</td>
        </tr>
    </table>
    <br></br>
    <a href="jogos.php">Ver os jogos cadastrados</a><br>
    <a href="cadastro.php">Cadastrar tenista</a>
</body>
</html>