<?php
    $conexao = mysqli_connect("localhost", "root", "", "federacao_tenis");
    $jogos = mysqli_query($conexao, "SELECT * FROM jogos JOIN campeonatos ON campeonatos.id = jogos.campeonatos_id JOIN quadras ON quadras.id = jogos.quadras_id");

?>
<!DOCTYPE html>
<html>
<head>
    <title>Federação de Tênis</title>
</head>
<body>
    <h1>Jogos</h1>
    <?php
        $linhas = mysqli_num_rows($jogos);  
        for($i = 0; $i < $linhas; $i++){ 
            $linha = mysqli_fetch_array($jogos);
           //REINICIA O POINTER DO mysqli_fetch_array por isso a repetição todo loop
            $jogadores = mysqli_query($conexao, "SELECT tenistas.nome,tenistas.id,tenistas.sexo,tenistas.data_nascimento FROM jogos j JOIN tenistas  ON tenistas.id = j.tenista_01_id OR tenistas.id = j.tenista_02_id"); 
            $nLinhaJogadores =  mysqli_num_rows($jogadores);

            for ($j = 0;$j < $nLinhaJogadores;$j++){
                $linhaJogadores = mysqli_fetch_array($jogadores); 
                if($linha["tenista_01_id"] == $linhaJogadores["id"]){
                    $jogador1 = $linhaJogadores; 
                }else{
                    if($linha["tenista_02_id"] == $linhaJogadores["id"]){
                        $jogador2 = $linhaJogadores; 
                    }
                }
            }   

        ?>    
            <h3>Jogo <?= $i+1?></h3> 

            
            Tenista 1 ID:<?= $linha["tenista_01_id"]?><br>
            Nome: <?= $jogador1["nome"]?><br>
            Sexo: <?= $jogador1["sexo"]?><br>
            Data de Nascimento: <?= $jogador1["data_nascimento"]?><br><br>
            Tenista 2 ID:<?= $linha["tenista_02_id"]?><br>
            Nome: <?= $jogador2["nome"]?><br>
            Sexo: <?= $jogador2["sexo"]?><br>
            Data de Nascimento: <?= $jogador2["data_nascimento"]?><br><br>
            Campeonato:<?= $linha[8]?><br>
            Público:<?= $linha["publico"]?><br>
            Pontuação do tenista 1:<?= $linha["pontuacao_tenista_01"]?><br>
            Pontuação do tenista 2:<?= $linha["pontuacao_tenista_02"]?><br>
            Quadra:<?= $linha[13]?><br>
            <br><br><br>
        <?php } 
        mysqli_close($conexao);
        ?>
    <br>
    <a href = "index.php">Voltar</a>
</body>
</html> 