<?php
    include 'Models/Conexao.php';
    include 'ModelsDAO/TenistaDAO.php';

    $Connection = new Conexao();
    $TenistaDAO = new TenistaDAO($Connection->get_connection());
    $AllTenistas = $TenistaDAO->GetAll();


?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Add</title>

    <!-- Estilo -->
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Outras funcionalidades:</h2>
    <ul>
        <li><a href="index.php">Exibir os tenistas cadastrados;</a></li>
        <li><a href="AddTenista.php">Adicionar tenista;</a></li>
        <li><a href="GameShow.php">Exibir os jogos cadastrados;</a></li>
    </ul>

    <h1>Insira os dados do novo tenista:</h1>
    <form action="index.php" method="post">
        <label for="id">ID:</label> <br>
        <input type="text" name="Id" id=""> <br>

        <label for="id">Nome:</label> <br>
        <input type="text" name="Nome" id=""> <br>

        <label for="id">Data de nascimento:</label> <br>
        <input type="text" name="DataNascimento" id=""> <br>

        <label for="id">Sexo(0 p/ homem & 1 p/ mulher):</label> <br>
        <input type="text" name="Sexo" id=""> <br>

        <label for="id">Id da categoria:</label> <br>
        <input type="text" name="Id_Categoria" id=""> <br>

        <input type="submit" value="Inserir">
    </form>
</body>
</html>