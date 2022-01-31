<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário - Cadastro de novo tenista</title>
</head>
<body>

    <h1>Cadastro de novo tenista</h1>

    <form action="listaTenistas.php" method="post">
        <label for="id">Id:</label> <br>
        <input type="text" name="id"> <br>
        <label for="id">Nome:</label> <br>
        <input type="text" name="nome"> <br>
        <label for="id">Data de nascimento:</label> <br>
        <input type="date" name="data_nascimento"> <br>
        <label for="id">Sexo:</label> <br>
        <input type="radio" name="sexo" value="1" checked> Homem <br>
        <input type="radio" name="sexo" value="0"> Mulher<br>
        <label for="id">Categoria:</label> <br>
        <input type="radio" name="categoria" value="0" checked> Sub-18 <br>
        <input type="radio" name="categoria" value="1"> Profissional<br>
        <input type="submit" value="Cadastrar">
    </form>
</body>
</html>