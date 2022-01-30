<?php
    class Quadras {
        private $id;
        private $tipo;
        private $endereco;

        public function __construct($id, $tipo, $endereco) {
            $this->id = $id;
            $this->tipo = $tipo;
            $this->endereco = $endereco;
        }

        public function get_id() {
            return $this->id;
        }        
        public function get_tipo() {
            return $this->tipo;
        }
        public function get_endereco() {
            return $this->endereco;
        }    

    }
?>