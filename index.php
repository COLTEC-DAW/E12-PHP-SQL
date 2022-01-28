<?php 
    // abre conexão com o BDD
    $conexao = mysqli_connect("localhost","root","","daw");

    // verifica se houve um request do tipo POST que indica o cadstro de um novo tenista
    $reqType = $_SERVER["REQUEST_METHOD"];
    
    $res_insert = false;
    if($reqType == 'POST'){
        $nome = $_POST["nome"];
        $sexo = $_POST["sexo"];
        $data_nascimento = $_POST["data_nascimento"];
        $categorias_id = (int)$_POST["categoria"];

        // insere os dados no BDD (res = resultado)
        $query = "INSERT INTO tenistas (nome,data_nascimento,sexo,categorias_id) VALUES (" .
        "\"$nome\", " .
        "\"$data_nascimento\", " .
        "\"$sexo\" ," .
        "$categorias_id " .
        ")";

        $res_insert = mysqli_query ($conexao, $query);    
    }
    // pega todos os tenistas para serem exibidos 
    $res = mysqli_query ($conexao, "SELECT t.id, t.nome, t.data_nascimento, t.sexo, c.nome FROM tenistas t JOIN categorias c ON c.id = t.categorias_id;");
    $num_categorias = mysqli_num_rows($res);

    
    mysqli_close($conexao);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MySQL</title>
</head>
<body>
    <h1>Lista de Tenistas: </h1>
    
    <?php if ($res_insert){ ?>
        <p><b>Usuário cadastrado com sucesso!</b></p>
    <?php } ?>

    <table border="1">
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Data de Nascimento</th>
        <th>Sexo</th>
        <th>Categoria</th>
    </tr>
        <?php
            for ($i = 0; $i < $num_categorias; ++$i) {
                $row = mysqli_fetch_array($res);
        ?>
    
        <tr>
            <td><?= $row[0] ?></td>
            <td><?= $row[1] ?></td>
            <td><?= $row[2] ?></td>
            <td><?= $row[3] ?></td>
            <td><?= $row[4] ?></td>
            
        </tr>
        <?php } ?>    
    </table>

    <p>
        <a href="registro.php"> Cadastrar novo tenista </a>
        <br>
        <a href="jogos.php"> Ver lista de jogos </a>
        
    </p>

</body>
</html>