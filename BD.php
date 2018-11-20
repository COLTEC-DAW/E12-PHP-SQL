<?php
   DEFINE('BD_USERNAME', 'root');
   DEFINE('BD_PASSWORD', '');
   DEFINE('BD_HOST', 'localhost:3000');
   DEFINE('BD_DATABASE', '2016951723');

   function connect(){

     $conexao = new mysqli (BD_HOST, BD_USERNAME, BD_PASSWORD, BD_DATABASE);
     if (mysqli_connect_error()) {
            die('Connect Error ('.mysqli_connect_errno().') '.mysqli_connect_error());
        }
        return $conexao;
    }

    function close($conexao){
        return mysqli_close($conexao);
    }
?>
