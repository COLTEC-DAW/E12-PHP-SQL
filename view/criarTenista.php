<?php

    require "../controller/TenistaController.php";
    require "../controller/CategoriaController.php";

    $categorias = CategoriaDAO::getCategorias();
    if(isset($_POST["nome"])) {
        if($_POST["sexo"] == "Masculino") {
            $sexo = (int)1;
        } else {
            $sexo = (int)0;
        }
        $tenista = new Tenista(TenistaDAO::getMaxId(), $_POST["nome"], $_POST["data_nascimento"], $sexo, intVal($_POST["categoria_nome"]));
        // var_dump($tenista);
        TenistaDAO::criarTenista($tenista);
        header("Location: listarTenista.php");
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
</head>
<body>
    <form action="criarTenista.php" method="POST">
        <input type="text" name="nome" placeholder="Nome"><br>
        <input type="text" name="data_nascimento" placeholder="Idade"><br>
        <select name="sexo" id="">
            <option value="Masculino">Masculino</option>
            <option value="Feminino">Feminino</option>
        </select>


        <select name="categoria_nome" id="">

        <?php for ($i=0; $i < count($categorias); $i++) { ?>
            <option value="<?=$categorias[$i]->getId()?>"> <?= $categorias[$i]->getNome(); ?> </option>
        <?php } ?>

        </select>

        <input type="submit" value="Cadastrar">
    </form>
</body>
</html>
