<?php
    class Jogo{
        private $Publico;
        private $Pontuacao_T_01;
        private $Pontuacao_T_02;
        private $Id_Quadra;
        private $Id_Campeonato;
        private $Id_Tenista_01;
        private $Id_Tenista_02;

        public function __construct($publico, $pontuacaoT01, $pontuacaoT02, $id_Quadra, $id_Campeonato, $id_Tenista01, $id_Tenista02) {
            $this->Publico = $publico;
            $this->Pontuacao_T_01 = $pontuacaoT01;
            $this->Pontuacao_T_02 = $pontuacaoT02;
            $this->Id_Quadra = $id_Quadr;
            $this->Id_Campeonato = $id_Campeonato;
            $this->Id_Tenista_01 = $id_Tenista01;
            $this->Id_Tenista_02 = $id_Tenista02;
        }

        public function get_Publico(){ return $this->Publico; }
        public function get_Pontuacao_T_01(){ return $this->Pontuacao_T_01; }
        public function get_Pontuacao_T_02(){ return $this->Pontuacao_T_02; }
        public function get_Id_Quadra(){ return $this->Id_Quadra; }
        public function get_Id_Campeonato(){ return $this->Id_Campeonato; }
        public function get_Id_Tenista_01(){ return $this->Id_Tenista_01; }
        public function get_Id_Tenista_02(){ return $this->Id_Tenista_02; }
    }
?>