<?php
    include_once "conexao.php";

    $conexao = new Conexao("federacao_tenis");
    $msqli = $conexao->getConnection();

    if (isset($_POST["addTenista"])) {
        include_once "federacao_tenis_tenistas.php";
        include_once "federacao_tenis_tenistasDAO.php";

        $tenistaToAdd = new Tenistas(null, $_POST["tenistaNome"], $_POST["tenistaDataNascimento"], $_POST["tenistaSexo"], $_POST["tenistaCategoria"]);

        $conexaoTenistas = new TenistasDAO($msqli);
        $conexaoTenistas->add($tenistaToAdd);
    }

    $pageToShow = $_POST["page"] ?? $_GET["page"] ?? "listaDeTenistas";
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Federacao Tenis</title>
    </head>
    <body>
        <h1>FEDERAÇÃO DE TENIS</h1>
        <form action="index.php" method="get">
            <button name="page" value="listaDeTenistas">Listagem e Inserção de Tenistas</button>
            <button name="page" value="listaDeJogos">Listagem de Jogos e Campeonatos</button>
        </form>

        <?php
            include $pageToShow . ".php";
        ?>
    </body>
</html>