<!DOCTYPE html>
<html lang="en">
<?php
    $conexao = mysqli_connect("localhost", "root", "", "federacao_tenis");

    //Cadastro
    //Selecao
    $resultado = mysqli_query($conexao, "SELECT categorias.nome, categorias.id FROM categorias;");
    $num = mysqli_num_rows($resultado);

    mysqli_close($conexao);

?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet" type="text/css">
    <title>Registro|Federação Tênis</title>
</head>
<body>
    <div class="container">
        <?php require 'header.inc'?>

        <h2>Registrar Novo/a Jogador/ra</h2>

        <form action="teste.php" method="post" id="form-registrar">
            Nome: <input type="text" name="nome" placeholder="Nome do tenista" autocomplete="off">
            Categoria: <select name="categoria">
                <?php for ($i = 0; $i < $num; $i ++){
                    $row = mysqli_fetch_array($resultado);
                    $id = $row["id"];
                    $nome = $row["nome"];
                    echo "<option value=$id>$nome</option>";
                }
                ?>
            </select>
            <br>
            Genero: 
            <input type="radio" name="genero" autocomplete="off" value=0 id="feminino"><label for="feminino">feminino</label>
            <input type="radio" name="genero" autocomplete="off" value=1 id="masculino"><label for="masculino">masculino</label>
            <br>
            Data de nascimento: <input type="date" name="data_nasc" autocomplete="off"> <br>
            <br>
            <input type="submit" name="registrar" value="Registrar novo/a jogador/ra">
        </form>
    </div>
</body>
</html>