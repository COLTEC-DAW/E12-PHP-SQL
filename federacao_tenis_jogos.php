<?php
    class Jogos {
        private $tenista_01_id;
        private $tenista_02_id;
        private $campeonatos_id;
        private $publico;
        private $pontuacao_tenista_01;
        private $pontuacao_tenista_02;
        private $quadras_id;

        public function __construct($tenista_01_id, $tenista_02_id, $campeonatos_id, $publico, $pontuacao_tenista_01, $pontuacao_tenista_02, $quadras_id) {
            $this->tenista_01_id = $tenista_01_id;
            $this->tenista_02_id = $tenista_02_id;
            $this->campeonatos_id = $campeonatos_id;
            $this->publico = $publico;
            $this->pontuacao_tenista_01 = $pontuacao_tenista_01;
            $this->pontuacao_tenista_02 = $pontuacao_tenista_02;
            $this->quadras_id = $quadras_id;
        }
                
        public function get_tenista_01_id() {
            return $this->tenista_01_id;
        }

        public function get_tenista_02_id() {
            return $this->tenista_02_id;
        }

        public function get_campeonatos_id() {
            return $this->campeonatos_id;
        }

        public function get_publico() {
            return $this->publico;
        }

        public function get_pontuacao_tenista_01() {
            return $this->pontuacao_tenista_01;
        }

        public function get_pontuacao_tenista_02() {
            return $this->pontuacao_tenista_02;
        }

        public function get_quadras_id() {
            return $this->quadras_id;
        }
    }
?>