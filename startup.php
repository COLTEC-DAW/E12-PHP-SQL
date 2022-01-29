<?php
    $conexao = mysqli_connect("localhost", "root", "", "federacao_tenis");

    $res_insert = mysqli_query($conexao, "INSERT INTO quadras VALUES (1,\"Quadra de saibro\", \"Patio Principal\")");
    $res_insert = mysqli_query($conexao, "INSERT INTO quadras VALUES (2,\"Quadra de grama\", \"Patio Principal\")");
    $res_insert = mysqli_query($conexao, "INSERT INTO quadras VALUES (3,\"Quadra dura\", \"Patio Principal\")");

    $res_insert = mysqli_query($conexao, "INSERT INTO categorias VALUES (1,\"Aprendiz\")");
    $res_insert = mysqli_query($conexao, "INSERT INTO categorias VALUES (2,\"Amador\")");
    $res_insert = mysqli_query($conexao, "INSERT INTO categorias VALUES (3,\"Profissional\")");
    $res_insert = mysqli_query($conexao, "INSERT INTO categorias VALUES (3,\"Treinador\")");

    mysqli_close($conexao);
?>