<?php
    class Campeonatos {
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

        public function get_id() {
            return $this->id;
        }

        public function get_nome() {
            return $this->nome;
        }

        public function get_edicao() {
            return $this->edicao;
        }

        public function get_data_realizacao() {
            return $this->data_realizacao;
        }

        public function get_premiacao() {
            return $this->premiacao;
        }
    }
?>