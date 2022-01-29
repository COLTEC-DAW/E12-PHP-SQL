<?php

    class Tenista
    {    
        private $id;
        private $nome;
        private $data_nascimento;
        private $sexo;
        private $categorias_id;
    

        public function _construct($id, $nome, $data_nascimento, $sexo, $categorias_id)
        {
            $this->id = $id;
            $this->nome = $nome;
            $this->data_nascimento = $data_nascimento;
            $this->sexo = $sexo;
            $this->categorias_id = $categorias_id;
        }
    
        public function get_id() { return $this->id;}
        public function get_nome() { return $this->nome;}
        public function get_data_nascimento() { return $this->data_nascimento;}
        public function get_sexo() { return $this->sexo;}
        public function get_categorias_id() { return $this->categorias_id;}
    }
?>