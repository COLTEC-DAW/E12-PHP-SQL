<?php
    class Tenista{
        private $Id;
        private $Nome;
        private $DataNascimento;
        private $Sexo;
        private $Id_Categoria;
        
        public function __construct($id, $nome, $dataNascimento, $sexo, $id_Categoria) {
            $this->Id = $id;
            $this->Nome = $nome;
            $this->DataNascimento = $dataNascimento;
            $this->Sexo = $sexo;
            $this->Id_Categoria = $id_Categoria;
        }

        public function get_Id(){ return $this->Id; }
        public function get_Nome(){ return $this->Nome; }
        public function get_DataNascimento(){ return $this->DataNascimento; }
        public function get_Id_Categoria(){ return $this->Id_Categoria; }
        public function get_Sexo(){ return $this->Sexo; }
        public function get_SexoString(){
            if($this->Sexo == 0){
                return "Masculino";  
            }else{
                return "Feminino";
            }
        }

    }
?>