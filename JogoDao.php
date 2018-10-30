<?php

// Exercício não pede cadastro de jogos, por isso só possui o método read() //

 class JogoDao{
     
    function read(){
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

$dao_jogo = new JogoDao();

?>