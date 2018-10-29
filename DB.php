<?php 
   DEFINE('DB_USERNAME', 'root');
   DEFINE('DB_PASSWORD', '');
   DEFINE('DB_HOST', 'localhost:3306');
   DEFINE('DB_DATABASE', '2016951618');
   
   function connect(){
        $conexao = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
        if (mysqli_connect_error()) {
            die('Connect Error ('.mysqli_connect_errno().') '.mysqli_connect_error());
        }
        return $conexao;
    }
        
    function close($conexao){
        return mysqli_close($conexao);
    }
?>