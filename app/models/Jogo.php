<?php
class Jogo {
    private $tenista01_nome;
    private $tenista02_nome;
    private $publico;
    private $campeonato_nome;
    private $tenista_01_pontuacao;
    private $tenista_02_pontuacao;
    private $quadra_tipo;
    public function __construct($tenista01_nome, $tenista02_nome, $publico, $campeonato_nome, $tenista_01_pontuacao, $tenista_02_pontuacao, $quadra_tipo) {
        $this->tenista01_nome = $tenista01_nome;
        $this->tenista02_nome = $tenista02_nome;
        $this->publico = $publico;
        $this->campeonato_nome = $campeonato_nome;
        $this->tenista_01_pontuacao = $tenista_01_pontuacao;
        $this->tenista_02_pontuacao = $tenista_02_pontuacao;
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
        return $this->tenista_01_pontuacao;
    }
    public function setPontuacaoTenista_01($tenista_01_pontuacao) {
        $this->tenista_01_pontuacao = $tenista_01_pontuacao;
    }
    public function getPontuacaoTenista_02() {
        return $this->tenista_02_pontuacao;
    }
    public function setPontuacaoTenista_02($tenista_02_pontuacao) {
        $this->tenista_02_pontuacao = $tenista_02_pontuacao;
    }
    public function getQuadra() {
        return $this->quadra_tipo;
    }
}
?>