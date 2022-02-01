<?php
    class Jogos
    {
        private $tenista_01_id;
        private $nome1;
        private $tenista_02_id;
        private $nome2;
        private $campeonatos_id;
        private $publico;
        private $pontuacao_tenista_01;
        private $pontuacao_tenista_02;
        private $quadras_id;
        private $tipoQ;

        public function __construct($tenista_01_id, $nome1, $tenista_02_id, $nome2, $campeonatos_id, $publico, $pontuacao_tenista_01, $pontuacao_tenista_02,
        $quadras_id, $tipoQ)
        {
            $this->tenista_01_id = $tenista_01_id; 
            $this->nome1 = $nome1; 
            $this->tenista_02_id = $tenista_02_id; 
            $this->nome2 = $nome2;
            $this->campeonatos_id = $campeonatos_id; 
            $this->publico = $publico;
            $this->pontuacao_tenista_01 = $pontuacao_tenista_01; 
            $this->pontuacao_tenista_02 = $pontuacao_tenista_02;
            $this->quadras_id = $quadras_id; 
            $this->tipoQ = $tipoQ;
        }

        public function get_tenista_01_id()
        {
            return $this->tenista_01_id;
        }
        public function get_nome1()
        {
            return $this->nome1;
        }
        public function get_tenista_02_id()
        {
            return $this->tenista_02_id;
        }
        public function get_nome2()
        {
            return $this->nome2;
        }
        public function get_campeonatos_id()
        {
            return $this->campeonatos_id;
        }
        public function get_pontuacao_tenista_01()
        {
            return $this->pontuacao_tenista_01;
        }
        public function get_pontuacao_tenista_02()
        {
            return $this->pontuacao_tenista_02;
        }
        public function get_quadras_id()
        {
            return $this->quadras_id;
        }
        public function get_tipoQ()
        {
            return $this->tipoQ;
        }

    }

?>