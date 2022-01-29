<?php
    $conexao = mysqli_connect("localhost", "root", "", "nova_atividade" );
    $reqType = $_SERVER["REQUEST_METHOD"];
    $res_insert = false;
    if($reqType == 'POST'){
        $id = $_POST["id"];
        $nome = $_POST["nome"];
        $data_nascimento = $_POST["data_nascimento"]; 
        $sexo = $_POST["sexo"];
        $categoria_id = $_POST["categoria_id"]; 
        $data_criacao = date('Y-m-d H:i:s');    
        
        $res_insert = mysqli_query($conexao, "INSERT INTO tenistas VALUES(
            \"$id\",
            \"$nome\",
            \"$data_nascimento\",
            \"$sexo\",
            \"$categoria_id\")");

    }

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
<body id="cadastro">
    <h1>
        Cadastrar Tenistas 
    </h1>
    
    <a href = "index.php">Home</a>/
    <a href="jogos.php">Jogos</a>/
    <a href="">Cadastrar Tenistas</a>
  
    
    <form action="cadatrosTenistas.php" method="post">
        <label for="id">Id:</label> <br>
        <input type="text" name="id" id=""> <br>

        <label for="id">Nome:</label> <br>
        <input type="text" name="nome" id=""> <br>

        <label for="id">Data de nascimento:</label> <br>
        <input type="text" name="data_nascimento" id=""> <br>

        <label for="id">Sexo:</label> <br>
        <input type="text" name="sexo" id=""> <br>

        <label for="id">categoria (id):</label> <br>
        <input type="text" name="categoria_id" id=""> <br>

        <input type="submit" value="enviar">
    </form>

    <?php if($res_insert){ ?>

        <p><b>Tenista cadastrado com sucesso!</b></p>
   
    <?php } ?>
</body>
</html>
    