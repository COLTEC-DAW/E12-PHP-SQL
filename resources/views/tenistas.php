
<?php
    require '../components/Header.php';
    require '../../app/models/Tenista.php';
    require '../../app/controllers/TenistaController.php';
    require '../../app/controllers/CategoriaController.php';

    $tenistas = TenistaController::getTenistas();
    $categorias = CategoriaController::getCategorias();

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $tenista = new Tenista(TenistaController::getLastId(), $_POST['nome'], $_POST['data_nascimento'], $_POST['sexo'], (int) $_POST["categoria"]);
        TenistaController::criarTenista($tenista);
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script
  src="https://code.jquery.com/jquery-3.6.0.js"
  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
  crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <style>
        .modal-backdrop.in {
            opacity: 0.9;
        }
    </style>
    <title>Federação Tenista</title>
</head>
<body>
    <?php echo getHeader("tenistas") ?>

    <div class="container mx-auto p-4 my-4">
        <h3 class="fs-4 fw-bold text-center">Lista de tenistas cadastrados</h3>
        <button class="btn btn-success mb-1" data-toggle="modal" data-target="#tenistas-modal">Adicionar</button>

        <table class="table table-success table-striped table-hover">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Data de nascimento</th>
                    <th>Sexo</th>
                    <th>Categoria</th>
                </tr>
            </thead>

            <tbody>
            <?php for ($i=0; $i< count($tenistas); $i++) { ?>
                <tr>
                    <td> <?= $tenistas[$i]->getNome() ?> </td>
                    <td> <?= $tenistas[$i]->getDataNascimento() ?> </td>
                    <td> <?= $tenistas[$i]->getSexo() ?> </td>
                    <td> <?= $tenistas[$i]->getCategoria() ?> </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    <div>
    
    <div class="modal bg-sucess" tabindex="-1" role="dialog" id="tenistas-modal"> 
        <div class="modal-dialog modal-dialog-centered" role="document">  
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Adicionar Tenista</h5>
                    <button class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="tenistas.php" method="POST">
                        <div class="mb-3">
                            <label class="form-label">Nome</label>
                            <input name="nome" type="text" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Data de Nascimento</label>
                            <input name="data_nascimento" type="date" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Categoria</label>
                            <select name="categoria" class="form-select">
                            <?php 
                                for ($i = 1; $i <= count($categorias); $i++){
                                    echo '<option value="'. $i .'">'. $categorias[$i - 1]->getNome() . '</option>';
                                }
                            ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Sexo</label>
                            <div class="form-check">
                                <input name="sexo" class="form-check-input" type="radio" value="m" name="flexRadioDefault">
                                <label class="form-check-label">
                                    Masculino
                                </label>
                            </div>
                            <div class="form-check">
                                <input name="sexo" class="form-check-input" type="radio" value="f" name="flexRadioDefault">
                                <label class="form-check-label">
                                    Feminino
                                </label>
                            </div>
                            <div class="form-check">
                                <input name="sexo" class="form-check-input" type="radio" value="0" name="flexRadioDefault">
                                <label class="form-check-label">
                                    Outro
                                </label>
                            </div>
                        </div>
                        
                        <button type="submit" class="btn btn-success">Enviar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>