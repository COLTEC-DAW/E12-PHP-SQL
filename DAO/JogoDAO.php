<?php

require_once "../models/Jogo.php";
require_once "../Connection.php";

class JogoDAO {

    public static function getJogos() {
        $jogosArray = array();
        
        $con = Connection::getConnection(); 
        $stmt = $con->prepare("SELECT t_01.nome AS `tenista01_nome`, j.pontuacao_tenista_01 AS `tenista01_pontuacao`,
		                            t_02.nome AS `tenista02_nome`, j.pontuacao_tenista_02 AS `tenista02_pontuacao`,
                                    j.publico AS `publico`,
                                    camp.nome AS `campeonato_nome`, q.tipo AS `quadra_tipo`        
	                        from jogos j 
	                        inner join tenistas t_01 
		                        on t_01.id = j.tenista_01_id 
	                        inner join tenistas t_02 
		                        on t_02.id = j.tenista_02_id 
	                        inner join campeonatos camp
		                        on camp.id = j.campeonatos_id
	                        inner join quadras q
		                        on q.id = j.quadras_id");
        if ($stmt->execute()) {
            if ($stmt->rowCount() > 0) {
                while($row = $stmt->fetch(PDO::FETCH_OBJ)) {

                    $jogo = new Jogo($row->tenista01_nome, 
                    $row->tenista02_nome,
                    $row->campeonato_nome, 
                    $row->publico,
                    $row->tenista01_pontuacao,
                    $row->tenista02_pontuacao,
                    $row->quadra_tipo);
                    
                    array_push($jogosArray, $jogo);
                }
            }
        }

        return $jogosArray;
    }

}

?>