<?php
class Tenista {
    private $id;
    private $nome;
    private $data_nascimento;
    private $sexo;
    private $categoria;
    public function __construct($id, $nome, $data_nascimento, $sexo, $categoria) {
        $this->id = $id;
        $this->nome = $nome;
        $this->data_nascimento = date('d/m/Y', strtotime($data_nascimento));
        $this->sexo = self::getSexoFormatted($sexo);
        $this->categoria = $categoria;
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
        return $this->categoria;
    }
    public function setCategoria($categoria) {
        $this->categoria = $categoria;
    }

    public static function getSexoFormatted($sexo){
        if($sexo == 'm') {
            return "Masculino";
        }
        else if($sexo == 'f'){
            return "Feminino";
        }
        else {
            return "Não Binário";
        }
    }
}
?>