<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Novo tenista</title>
</head>
<body>

    <h1>Novo Tenista</h1>

    <form action="index1.php" method="post">
        <label for="id">ID:</label> <br>
        <input type="text" name="id" id=""> <br>
        <label for="id">Nome:</label> <br>
        <input type="text" name="nome" id=""> <br>

        <label for="id">Data de nascimento:</label> <br>
        <input type="date" name="data_nascimento" id=""> <br>

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