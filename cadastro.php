<?php
    $conexao = mysqli_connect("localhost", "root", "", "federacao_tenis");
    $res = mysqli_query($conexao, "SELECT * FROM tenistas");
    mysqli_close($conexao);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Federação de Tênis</title>
</head>
<body>
    <h1>Cadastrar novo tenista</h1>
    <form>
        <label for="nome">Nome:</label><br>
        <input type="text" id="nome" name="nome"><br><br>
        <label for="dataNascimento">Data de Nascimento:</label><br>
        <input type="date" id="dataNascimento" name="dataNascimento"><br><br>
        Sexo:<br>
        <input type="radio" id="fem" value=1 name="sexo">    
        <label for="fem">Feminino</label><br>
        <input type="radio" id="masc" value=0 name="sexo">
        <label for="masc">Masculino</label><br><br>
        Categoria:<br>
        <input type="radio" id=0 value=0 name="categoria">    
        <label for="0">Profissional</label><br>
        <input type="radio" id=1 value=1 name="categoria">
        <label for="1">Amador</label><br>
        <input type="radio" id=2 value=2 name="categoria">
        <label for="2">Júnior</label><br><br>
        <br>
        <input type="submit" value="Cadastrar">
    </form>
    <br><br>
    <a href = "tenistas.php">Voltar para a página de tenistas cadastrados</a>
</body>
</html>