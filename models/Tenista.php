<?php
class Tenista {
    private $id;
    private $nome;
    private $data_nascimento;
    private $sexo;
    private $categoriaNome;
    public function __construct($id, $nome, $data_nascimento, $sexo, $categoriaNome) {
        $this->id = $id;
        $this->nome = $nome;
        $this->data_nascimento = $data_nascimento;
        $this->sexo = $sexo;
        $this->categoriaNome = $categoriaNome;
    }
    
    public function getId() {
        return $this->id;
    }
    public function getNome() {
        return $this->nome;
    }
    public function setNome($nome) {
        $this->nome= $nome;
    }
    public function getDataNascimento() {
        return $this->data_nascimento;
    }
    public function setdataNascimento($data_nascimento) {
        $this->data_nascimento = $data_nascimento;
    }
    public function getSexo() {
        return $this->sexo;
    }
    public function setSexo($sexo) {
        $this->sexo = $sexo;
    }
    public function getCategoria() {
        return $this->categoriaNome;
    }
    public function setCategoriaNome($categoriaNome) {
            $this->categoriaNome = $categoriaNome;
    }
    public static function parseSexoBinary($sexo) {
        if($sexo == 1) {
            return "Masculino";
        }
        return "Feminino";
    }
}
?>
