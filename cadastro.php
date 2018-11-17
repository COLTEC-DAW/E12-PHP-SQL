<?php 
    DEFINE('DB_USERNAME', 'root');
    DEFINE('DB_PASSWORD', '');
    DEFINE('DB_HOST', 'localhost:3306');
    DEFINE('DB_DATABASE', '2016952134');
    
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

<?php
    class Categoria{
        function count1(){
            $conexao = connect();
            $resultado = mysqli_query($conexao, "SELECT * FROM categorias");
            close($conexao);
            
            $categorias;
            for ($i=0; $i< mysqli_num_rows($resultado); $i++){
                $categorias[$i] = mysqli_fetch_object($resultado);
            }
            return $categorias;
        }
    }
 $categoria = new Categoria();
 ?> 

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastro tenista</title>
</head>
<body>
    <form action="form.php" method="POST">
        <p>Nome</p>
        <input type="text" name="nome" placeholder="Nome" required><br>
        
        <p>Data de nascimento</p>
        <input type="date" name="data" required><br>
        
        <p>Categoria</p>    
        <select name="categorias_id" required>
        <?php 
            $categorias = $categoria->count();
            for ($i=1; $i<=count2($categorias); $i++){
                echo '<option value="'. $i .'">'. $categorias[$i-1]->nome . '</option>';
            }
        ?>
        </select><br>
         <p>Sexo</p>
        <input name="sexo" value="1" checked> Homem
        <input name="sexo" value="0"> Mulher<br><br>
         <input type="submit" value="Cadastro">
    </form>

</body>
</html> 