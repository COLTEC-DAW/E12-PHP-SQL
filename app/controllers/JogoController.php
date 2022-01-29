<?php
require_once __DIR__."/../models/Jogo.php";
require_once __DIR__."/../../database/Connector.php";

class JogoController {

    public static function getJogos() {
        $conn = Connection::getConnection();

        $jogos = [];
        
        $queryString = "SELECT t_01.nome AS `tenista01_nome`, j.pontuacao_tenista_01 AS `tenista01_pontuacao`, t_02.nome AS `tenista02_nome`, j.pontuacao_tenista_02 AS `tenista02_pontuacao`, j.publico AS `publico`, camp.nome AS `campeonato_nome`, q.tipo AS `quadra_tipo` from jogos j inner join tenistas t_01 on t_01.id = j.tenista_01_id inner join tenistas t_02 on t_02.id = j.tenista_02_id inner join campeonatos camp on camp.id = j.campeonatos_id inner join quadras q on q.id = j.quadras_id";
        $statement = $conn->prepare($queryString);

        if ($statement->execute()) {
            if ($statement->rowCount() > 0) {
                while($row = $statement->fetch(PDO::FETCH_OBJ)) {
                    $jogo = new Jogo($row->tenista01_nome, $row->tenista02_nome, $row->campeonato_nome, $row->publico, $row->tenista01_pontuacao, $row->tenista02_pontuacao, $row->quadra_tipo);
                    $jogos[] = $jogo;
                }
            }
        }
        return $jogos;
    }
}
?>