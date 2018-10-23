<?php
    require "../DAO/TenistaDAO.php";
    require "../DAO/CategoriaDAO.php";

    $rs_categoriasNome = CategoriaDAO::getCategorias();

    if(isset($_POST["nome"])) {

        if($_POST["sexo"] == "Masculino") {
            $sexo = (int)1;
        } else {
            $sexo = (int)0;
        }

        $tenista = new Tenista(TenistaDAO::getMaxId(), $_POST["nome"], $_POST["data_nascimento"], $sexo, intVal($_POST["categoria_nome"]));  
        // var_dump($tenista);
        TenistaDAO::createTenista($tenista);      
        header("Location: index.php");
    }
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastro de tenista</title>
</head>
<body>
    <form action="createTenista.php" method="POST">
        <input type="text" name="nome" placeholder="Nome"><br>
        <input type="text" name="data_nascimento" placeholder="Idade"><br>
        <select name="sexo" id="">
            <option value="Masculino">Masculino</option>
            <option value="Feminino">Feminino</option>
        </select>


        <select name="categoria_nome" id="">
        
        <?php for ($i=0; $i < count($rs_categoriasNome); $i++) { ?>
            <option value="<?=$rs_categoriasNome[$i]->getId()?>"> <?= $rs_categoriasNome[$i]->getNome(); ?> </option>
        <?php } ?>

        </select>

        <input type="submit" value="Cadastrar">
    </form>
</body>
</html>