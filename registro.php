<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="index.php" method="post">

        <label for="">Nome</label><br>
        <input type="text" name="nome"><br><br>

        <label for="">Sexo</label><br>
        <input type="radio" name="sexo" value="m" id="m">
        <label for="m"> Masculino </label>
        <input type="radio" name="sexo" value="f" id="f">
        <label for="f"> Feminino </label> <br><br>
        
        <label for="">Categoria</label><br>
        <input type="radio" name="categoria" value="1" id="junior">
        <label for="junior"> Júnior </label>
        <input type="radio" name="categoria" value="2" id="profissional">
        <label for="profissional"> Profissional </label> 
        <input type="radio" name="categoria" value="3" id="aposentado">
        <label for="aposentado"> Aposentado </label> <br><br>

        <label for="">Data de nascimento</label><br>
        <input type="date" name="data_nascimento"><br> <br>

        <input type="submit" value="Cadastrar">
    </form>

</body>
</html>