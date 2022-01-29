<?php

    $conexao = mysqli_connect("localhost", "root", "", "tenisdosamigos");
    mysqli_close($conexao);

?>
<!DOCTYPE html>
<html>
<head>

    <title>Tenis dos Amigos</title>

</head>

    <body>

        <h2>Cadastrar jogador</h2>

        <form action="index.php">

            <label for="name">Nome:</label>
            <input type="text" id="name" name="name"><br><br>

            <label for="dateN">Data de Nascimento:</label>
            <input type="date" id="dateN" name="dateN"><br><br>

            Sexo:
            <input type="radio" id="fem" value=1 name="gender">    
            <label for="fem">Feminino</label>

            <input type="radio" id="masc" value=0 name="gender">
            <label for="masc">Masculino</label><br><br>

            Categoria:<br>
            <input type="radio" id=0 value=0 name="category">    
            <label for="0">Iniciante</label><br>

            <input type="radio" id=1 value=1 name="category">
            <label for="1">Amador</label><br>

            <input type="radio" id=2 value=2 name="category">
            <label for="2">Profissional</label><br><br>

            <br>
            <input type="submit" value="Cadastrar">
            <button><a href="index.php" class="button">Cancelar</a></button>


        </form>

        <br>

        <button><a href = "index.php">Voltar para a página de tenistas cadastrados</a></button>

    </body>

</html> 