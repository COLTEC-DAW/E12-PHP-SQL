<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Tenista</title>
</head>
<body>
    <br>
    <form action="index.php" method="post">
        <label for="nome">Nome</label> <br>
        <input type="text" name="nome" id="nome"> <br>
        
        <br>
        <label for="sexo">Sexo</label> <br>
        <label for="masculino">Masculino</label> <br>
        <input type="radio" name="sexo" value=0 id="masculino"> <br>
        <label for="feminino">Feminino</label> <br>
        <input type="radio" name="sexo" value=1 id="feminino"> <br>

        <br>
        <label for="categorias">Categorias :</label> <br>
        <label for="categoria_ex_1">Categoria_ex_1</label> <br>
        <input type="radio" name="categorias" value=1 id="categoria_ex_1"> <br>
        
        <label for="categoria_ex_2">Categoria_ex_2</label> <br>
        <input type="radio" name="categorias" value=2 id="categoria_ex_2"> <br>
        
        <label for="categoria_ex_3">Categoria_ex_3</label> <br>
        <input type="radio" name="categorias" value=3 id="categoria_ex_3"> <br>
        
        <br>
        <label for="data">Data de Nascimento</label><br>
        <input type="date" name="data_nascimento" id="data"> <br>
        
        <br>
        <input type="submit" value="Cadastro">
    </form>
</body>
</html>