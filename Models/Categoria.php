<?php
    class Categoria{
        private $Id;
        private $Nome;

        public function __construct($id, $nome) {
            $this->Id = $id;
            $this->Nome = $nome;
        }

        public function get_Id(){ return $this->Id; }
        public function get_Nome(){ return $this->Nome; }
    }
?>