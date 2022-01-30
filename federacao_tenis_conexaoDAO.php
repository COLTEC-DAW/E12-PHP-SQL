<?php
    class ConexaoDAO {

        private $conexao;

        public function __construct($conexao) {
            $this->conexao = $conexao;
        }

        public function addItemTo($tabela, $item) {
            $vars = $item->get_vars_array();
            
            $keys = '';
            $values = '';
            foreach ($vars as $var) {
                $keys .= key($var) . ", ";
                $values .= $var . ", ";
            }
            $keys = trim($keys, ', ');
            $values = trim($values, ', ');

            mysqli_query($this->conexao, "INSERT INTO $tabela ($keys) VALUES ($values);");
        }

        public function getAllFrom($tabela) {
            $items = [];
            $class = 'Class'.ucfirst($tabela);

            var_dump($this->conexao);

            $result = mysqli_query($this->conexao, ("SELECT * FROM $tabela"));

            $num_items = mysqli_num_rows($result);
            for ($i = 0; $i < $num_items; $i++) {
                
                $row = mysqli_fetch_array($result);
                $item = new $class($row);
                $items[] = $item;
            }
            
            return $items;
        }

        public function getValueFromId($tabela, $identifiers, $value_name) {
            $value = '';

            $clauses = '';
            foreach ($identifiers as $id) {
                $key = key($id);
                $clauses .= "$key = $id";
            }
            $clauses = trim($clauses, "AND ");

            $result = mysqli_query($this->conexao, ("SELECT $key FROM $tabela WHERE $clauses"));
            $row = mysqli_fetch_array($result);
            return $row[$value_name];
        }


    }
?>