<?php 
    DEFINE('DB_USERNAME', 'root');
    DEFINE('DB_PASSWORD', '');
    DEFINE('DB_HOST', 'localhost:3306');
    DEFINE('DB_DATABASE', '2016952134');
    
    function connect(){
        $conexao = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
        if (mysqli_connect_error()) {
            die('Connect Error ('.mysqli_connect_errno().') '.mysqli_connect_error());
        }
        return $conexao;
    }
            
    function close($conexao){
        return mysqli_close($conexao);
    }
?> 

<?php
    class Jogos{
     
    function count1(){
        $conexao = connect();
         $query = "SELECT t1.nome tenista1, t2.nome tenista2, c.nome campeonato, j.publico, j.pontuacao_tenista_01, j.pontuacao_tenista_02, q.tipo tipo_quadra FROM jogos j
            JOIN tenistas t1 ON j.tenista_01_id = t1.id
            JOIN tenistas t2 ON j.tenista_02_id = t2.id
            JOIN campeonatos c ON j.campeonatos_id = c.id
            JOIN quadras q ON j.quadras_id = q.id;";
            $resultado = mysqli_query($conexao, $query);
        close($conexao);
        
        $jogos;
        for ($i=0; $i< mysqli_num_rows($resultado); $i++){
            $jogos[$i] = mysqli_fetch_object($resultado);
        }
        return $jogos;
    }
}
$jogos = new Jogos();
$resultado_jogo = $jogos->count1();
?> 

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
 </head>
<body>
     
    <table>
            <th>Tenista 1</th>
            <th>Tenista 2</th>
            <th>Campeonato</th>
            <th>Público</th>
            <th>Pontuação Tenista 1</th>
            <th>Pontuação Tenista 2</th>
            <th>Quadra</th>
        <?php for ($i=0; $i< count2($resultado_jogo); $i++) { ?>
            <tr>
                <td> <?= $resultado_jogo[$i]->tenista1; ?> </td>
                <td> <?= $resultado_jogo[$i]->tenista2; ?> </td>
                <td> <?= $resultado_jogo[$i]->campeonato; ?> </td>
                <td> <?= $resultado_jogo[$i]->publico; ?> </td>
                <td> <?= $resultado_jogo[$i]->pontuacao_tenista_01; ?> </td>
                <td> <?= $resultado_jogo[$i]->pontuacao_tenista_02; ?> </td>
                <td> <?= $resultado_jogo[$i]->tipo_quadra; ?> </td>
            </tr>
        <?php } ?>
    </table>
 </body>
</html> 