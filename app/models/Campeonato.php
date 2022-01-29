<?php
class Campeonato {
    private $id;
    private $nome;
    private $edicao;
    private $data_realizacao;
    private $premiacao;
    public function __construct($id, $nome, $edicao, $data_realizacao, $premiacao) {
        $this->id = $id;
        $this->nome = $nome;
        $this->edicao = $edicao;
        $this->data_realizacao = $data_realizacao;
        $this->premiacao = $premiacao;
    }

    public function getId() {
        return $this->id;
    }
    public function getNome() {
        return $this->nome;
    }
    public function setNome($nome) {
        $this->nome = $nome;
    }
    public function getEdicao() {
        return $this->edicao;
    }
    public function setEdicao($edicao) {
        $this->edicao = $edicao;
    }
    public function getDataRealizacao() {
        return $this->data_realizacao;
    }
    public function setDataRealizacao($data_realizacao) {
        $this->data_realizacao = $data_realizacao;
    }
    public function getPremiacao() {
        return $this->premiacao;
    }
    public function setPremiacao($premiacao) {
        $this->premiacao = $premiacao;
    }
}
?>