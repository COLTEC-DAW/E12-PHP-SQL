<?php
    include 'Models/Conexao.php';
    include 'ModelsDAO/JogoDAO.php';

    $Connection = new Conexao();
    $JogoDAO = new JogoDAO($Connection->get_connection());
    $AllJogos = $JogoDAO->GetAllFormated();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Show!</title>

    <!-- Estilo -->
    <link rel="stylesheet" href="s_style.css">
</head>
<body>
    <h2>Outras funcionalidades:</h2>
    <ul>
        <li><a href="index.php">Exibir os tenistas cadastrados;</a></li>
        <li><a href="AddTenista.php">Adicionar tenista;</a></li>
        <li><a href="GameShow.php">Exibir os jogos cadastrados;</a></li>
    </ul>
    <h2>Jogos cadastrados:</h2>
    <div id="Content">
        <?php 
        foreach ($AllJogos as $jogo) { 
            echo "</br>--------------------------------------</br>" . $jogo . "--------------------------------------</</br></br>";
        } 
        ?>
    </div>
</body>
</html>