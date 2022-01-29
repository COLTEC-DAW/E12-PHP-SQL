<?php
//1. Implemente um formulário para cadastro de novos tenistas

    $conexao = mysqli_connect("localhost", "root", "", "E12");
    $res = mysqli_query($conexao, "SELECT * FROM tenistas");
    mysqli_close($conexao);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tênis Club</title>
</head>
<body>
    <h1>Cadastrar Novo Tenista</h1>
    <form>
        <label for="nome">Nome:</label><br>
        <input type="text" id="nome" name="nome"><br><br>
        <label for="dataNascimento">Data de Nascimento:</label><br>
        <input type="date" id="dataNascimento" name="dataNascimento"><br><br>
        Sexo:<br>
        <input type="radio" id="F" value= "F" name="sexo">    
        <label for="fem">Feminino</label><br>
        <input type="radio" id="M" value="M" name="sexo">
        <label for="masc">Masculino</label><br><br>
        Categoria:<br>
        <input type="radio" id=1 value=1 name="categoria">    
        <label for="1">Iniciante</label><br>
        <input type="radio" id=2 value=2 name="categoria">
        <label for="2">Intermediário</label><br>
        <input type="radio" id=3 value=3 name="categoria">
        <label for="3">Profissional</label><br><br>
        <br>
        <input type="submit" value="Cadastrar">
    </form>
    <br><br>
    <a href = "Tenistas.php">Voltar para a página de tenistas cadastrados</a>
</body>
</html> 