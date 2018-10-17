<?php 

class Jogo {
    private $tenista01_nome;
    private $tenista02_nome;
    private $campeonato_nome;
    private $publico;
    private $pontuacao_tenista_01;
    private $pontuacao_tenista_02;
    private $quadra_tipo;

    public function __construct($tenista01_nome, 
                                $tenista02_nome, 
                                $campeonato_nome,
                                $publico,
                                $pontuacao_tenista_01,
                                $pontuacao_tenista_02,
                                $quadra_tipo) {

        $this->tenista01_nome = $tenista01_nome;
        $this->tenista02_nome = $tenista02_nome;
        $this->campeonato_nome = $campeonato_nome;
        $this->publico = $publico;
        $this->pontuacao_tenista_01 = $pontuacao_tenista_01;
        $this->pontuacao_tenista_02 = $pontuacao_tenista_02;
        $this->quadra_tipo = $quadra_tipo;
    }

    public function getTenista_01() {
        return $this->tenista01_nome;
    }

    public function getTenista_02() {
        return $this->tenista02_nome;
    }

    public function getCampeonato() {
        return $this->campeonato_nome;
    }

    public function getPublico() {
        return $this->publico;
    }

    public function setPublico($publico) {
        $this->publico = $publico;
    }

    public function getPontuacaoTenista_01() {
        return $this->pontuacao_tenista_01;
    }

    public function setPontuacaoTenista_01($pontuacao_tenista_01) {
        $this->pontuacao_tenista_01 = $pontuacao_tenista_01;
    }

    public function getPontuacaoTenista_02() {
        return $this->pontuacao_tenista_02;
    }

    public function getQuadra() {
        return $this->quadra_tipo;
    }
}

?>