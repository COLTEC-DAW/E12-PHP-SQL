<?php

function getHeader($where){
if($where == 'tenistas'){
    return 
    '<div class="bg-success p-4 text-white bg-opacity-75">
        <div class="container mx-auto d-flex flex-row justify-content-between align-items-center">
            <div>
                <h1 class="fs-4 text-center fw-bold">Federação Tenista</h1>
            </div>
            <ul id="menu" class="nav nav-pills">
                <li class="nav-item">
                    <a class="nav-link active" href="tenistas.php">Tenistas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="jogos.php">Jogos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#">Categorias</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled">Campeonatos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled">Quadras</a>
                </li>
            </ul>
        </div>
    </div>';
    }
    else if($where == 'jogos'){
        return 
        '<div class="bg-success p-4 text-white bg-opacity-75">
            <div class="container mx-auto d-flex flex-row justify-content-between align-items-center">
                <div>
                    <h1 class="fs-4 text-center fw-bold">Federação Tenista</h1>
                </div>
                <ul id="menu" class="nav nav-pills">
                    <li class="nav-item">
                        <a class="nav-link" href="tenistas.php">Tenistas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="jogos.php">Jogos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#">Categorias</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled">Campeonatos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled">Quadras</a>
                    </li>
                </ul>
            </div>
        </div>';
    }   
}
?>