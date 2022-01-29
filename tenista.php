<?php

    class Tenista{
        private string $nome;
        private string $data_nasc;
        private int $genero;
        private string $categoria;

        function __construct($nome, $data_nasc, $genero, $categoria){
            $this->nome = $nome;
            $this->data_nasc = $data_nasc;
            $this->genero = $genero;
            $this->categoria = $categoria;
        }

        function echoTenista(){
            echo "<li><div class='nome-tenista'>$this->nome</div>
            <div class='categoria'>$this->categoria</div>";
            echo $this->genero == 0 ? "<div class='genero'>Feminino</div>" : "<div class='genero'>Masculino</div>";
            echo"<div class='data-nasc'>$this->data_nasc</div></li>";
        }

        function getNome(){return $this->nome;}
        function getDataNasc(){return $this->data_nasc;}
        function getGenero(){return $this->genero;}
    }
?>