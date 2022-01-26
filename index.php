<?php
    include 'Models/Conexao.php';
    include 'ModelsDAO/TenistaDAO.php';
    include 'ModelsDAO/JogoDAO.php';
    include 'ModelsDAO/CampeonatoDAO.php';
    include 'ModelsDAO/QuadraDAO.php';
    include 'ModelsDAO/CategoriaDAO.php';

    $Connection = new Conexao();

    $TenistaDAO     = new TenistaDAO($Connection->get_connection());
    $JogoDAO        = new JogoDAO($Connection->get_connection());
    $CampeonatoDAO  = new CampeonatoDAO($Connection->get_connection());
    $QuadraDAO      = new QuadraDAO($Connection->get_connection());
    $CategoriaDAO   = new CategoriaDAO($Connection->get_connection());

    if(isset($_POST['Id'])){
        $newTenista = new Tenista($_POST['Id'],$_POST['Nome'],$_POST['DataNascimento'],(int)$_POST['Sexo'],$_POST['Id_Categoria']);
        $TenistaDAO->addNewTenista($newTenista);
    }

    $AllTenistas = $TenistaDAO->GetAll();

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Integração</title>

    <!-- Estilo -->
    <link rel="stylesheet" href="s_style.css">
</head>
<body>
    <div class="Titulo">
        <h1>Bem vindo!</h1>
    </div>

    <h2>Outras funcionalidades:</h2>
    <ul>
        <li><a href="index.php">Exibir os tenistas cadastrados;</a></li>
        <li><a href="AddTenista.php">Adicionar tenista;</a></li>
        <li><a href="GameShow.php">Exibir os jogos cadastrados;</a></li>
    </ul>
        
    <h2>Tenistas cadastrados:</h2>
    <div id="Content">
        <table class="TabelaContent">
            <tr>
                <th>Id:</th>
                <th>Nome:</th>
                <th>Data de nascimento:</th>
                <th>Sexo:</th>
                <th>Categoria(ID):</th>
            </tr>
            <?php foreach ($AllTenistas as $tenista) { ?>
            <tr>
                <td><?= $tenista->get_Id() ?></td>
                <td><?= $tenista->get_Nome() ?></td>
                <td><?= $tenista->get_DataNascimento() ?></td>
                <td><?= $tenista->get_SexoString() ?></td>
                <td><?= $tenista->get_Id_Categoria() ?></td>
            </tr>
        <?php } ?>
        </table>
    </div>

    <!-- Funcionalidade -->
    <script src="./script.js"></script>
</body>
</html>