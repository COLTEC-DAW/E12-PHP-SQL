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
    class Tenistas{
    var $table = "tenistas";
     function insert($nome, $data_nascimento, $sexo, $categorias_id){
        $conexao = connect();
        $resultado = mysqli_query($conexao, "INSERT INTO " . $this->table . "(nome, data_nascimento, sexo, categorias_id) VALUES (\"". $nome ."\", \"". $data_nascimento . "\", " . $sexo . ", " . $categorias_id . ");");
        close($conexao);
         return $resultado;
    }
     function count1(){
        $conexao = connect();
         $resultado = mysqli_query($conexao, "SELECT t.*, c.nome categoria FROM tenistas t JOIN categorias c ON t.categorias_id = c.id;");
        close($conexao);
        
        $tenistas;
        for ($i=0; $i< mysqli_num_rows($resultado); $i++){ 
            $tenistas[$i] = mysqli_fetch_object($resultado);
        }
        return $tenistas;
    }
}
 $tenistas = new Tenistas();
 $resultado_tenista = $tenistas->count1();
 ?> 

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>lista de tenistas</title>
 </head>
<body>
    <table>
        <th>Nome</th>
        <th>Data de nascimento</th>
        <th>Sexo</th>
        <th>Categoria</th>
        <?php for ($i=0; $i< count2($resultado_tenista); $i++) { ?>
            <tr>
                <td> <?= $resultado_tenista[$i]->nome; ?> </td>
                <td> <?= date('d-m-Y', strtotime($resultado_tenista[$i]->data_nascimento)) ?> </td>
                <td>
                    <?php if ($resultado_tenista[$i]->sexo == 1){
                            echo 'masculino';
                        }else{
                            echo 'feminino';
                        }
                    ?>
                </td>
                <td> <?= $resultado_tenista[$i]->categoria; ?> </td>
            </tr>
        <?php } ?>
    </table>    
 </body>
</html> 