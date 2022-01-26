<?php
    class Campeonato{
        private $Id;
        private $Nome;
        private $Edicao;
        private $DataRealizacao;
        private $Premiacao;

        public function __construct($id, $nome, $edicao, $dataREalizacao, $premiacao) {
            $this->Id = $id;
            $this->Nome = $nome;
            $this->Edicao = $edicao;
            $this->DataRealizacao = $dataREalizacao;
            $this->Premiacao = $premiacao;
        }

        public function get_Id(){ return $this->Id; }
        public function get_Nome(){ return $this->Nome; }
        public function get_Edicao(){ return $this->Edicao; }
        public function get_DataRealizacao(){ return $this->DataRealizacao; }
        public function get_Premiacao(){ return $this->Premiacao; }
    }
?>