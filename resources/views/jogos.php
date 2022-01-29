
<?php
    require '../components/Header.php';
    require '../../app/controllers/JogoController.php';

    $jogos = JogoController::getJogos();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Federação Tenista</title>
</head>
<body>
    <?php echo getHeader("jogos") ?>

    <div class="container mx-auto p-4 my-4">
        <h3 class="fs-4 fw-bold text-center">Lista de jogos cadastrados</h3>
        <table class="table table-success table-striped table-hover">
            <thead>
                <th>Tenista 1</th>
                <th>Tenista 2</th>
                <th>Campeonato</th>
                <th>Público</th>
                <th>Pontuação Tenista 1</th>
                <th>Pontuação Tenista 2</th>
                <th>Quadra</th>
            </thead>
            <tbody>
            <?php for ($i=0; $i< count($jogos); $i++) { ?>
                <tr>
                    <td> <?= $jogos[$i]->getTenista_01() ?> </td>
                    <td> <?= $jogos[$i]->getTenista_02() ?> </td>
                    <td> <?= $jogos[$i]->getCampeonato() ?> </td>
                    <td> <?= $jogos[$i]->getPublico() ?> </td>
                    <td> <?= $jogos[$i]->getPontuacaoTenista_01() ?> </td>
                    <td> <?= $jogos[$i]->getPontuacaoTenista_02() ?> </td>
                    <td> <?= $jogos[$i]->getQuadra() ?> </td>
                </tr>
            <?php } ?>
            <tbody>
        </table>
    <div>
    
    <form id="tenista-form" class="modal">
        <div class="mb-3">
            <label class="form-label">Email address</label>
            <input type="email" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" class="form-control">
        </div>
        <select class="form-select" aria-label="Default select example">
        <?php 
            for ($i = 1; $i <= count($categorias); $i++){
                echo '<option value="'. $i .'">'. $categorias[$i - 1]->getNome() . '</option>';
            }
        ?>
        </select>
        <div class="form-check">
            <input class="form-check-input" type="radio" value="-1" name="flexRadioDefault">
            <label class="form-check-label">
                Masculino
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" value="1" name="flexRadioDefault">
            <label class="form-check-label">
                Feminino
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" value="0" name="flexRadioDefault">
            <label class="form-check-label">
                Não Binário
            </label>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</body>
</html>