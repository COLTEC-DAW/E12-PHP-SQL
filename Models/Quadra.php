<?php
    class Quadra{
        private $Id;
        private $Tipo;
        private $Endereco;

        public function __construct($id, $tipo, $endereco) {
            $this->$Id = $id;
            $this->$Tipo = $tipo;
            $this->$Endereco = $endereco;
        }

        public function get_Id(){ return $this->Id; }
        public function get_Tipo(){ return $this->Tipo; }
        public function get_Endereco(){ return $this->Endereco; }
    }
?>