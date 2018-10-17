<?php 

class Quadra {

    private $id;
    private $tipo;
    private $endereco;

    public function __construct ($id, $tipo, $endereco) {
        $this->id = $id;
        $this->tipo = $tipo;
        $this->endereco = $endereco;
    }

    public function getId() {
        return $this->id;
    }

    public function getTipo() {
        return $this->tipo;
    }

    public function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    public function getEndereco() {
        return $this->endereco;
    }

    public function setEndereco($endereco) {
        $this->endereco = $endereco;
    }

}

?>