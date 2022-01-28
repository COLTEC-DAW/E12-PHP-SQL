<?php
    include "jogos.php";
    class ConexaoDAO
    {
        private $conexao;

        public function __construct($conexao)
        {
            $this->conexao = $conexao;
        }
        public function add()
        {

        }
        public function getAll()
        {
            $jogos = [];

            $resultado = mysqli_query($this->conexao, 
            "SELECT j.tenista_01_id, t1.nome j.tenista_02_id, t2.nome, j.campeonatos_id, j.publico, j.pontuacao_tenista_01, j.pontuacao_tenista_02,
            j.quadras_id, q.tipo
            FROM jogos j 
            JOIN tenistas t1 ON j.tenista_01_id LIKE t1.id
            JOIN tenistas t2 ON j.tenista_02_id LIKE t2.id
            JOIN quadras q ON j.quadras_id LIKE q.id");
            $numero_de_jogos = mysqli_num_rows($resultado);
            for($i = 0; $i < $numero_de_jogos; $i++)
            {
                $row = mysqli_fetch_array($resultado);
                $new_jogo = new Jogos
                (
                    $row[0],
                    $row[1],
                    $row[2],
                    $row[3],
                    $row[4],
                    $row[5],
                    $row[6],
                    $row[7],
                    $row[8],
                    $row[9]
                );

                $jogo[] = $new_jogo;
            }
        }
    }
?>