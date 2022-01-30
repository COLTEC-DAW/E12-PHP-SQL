<?php

    include_once "conexao.php";

    include_once "federacao_tenis_categoriasDAO.php";
    include_once "federacao_tenis_tenistasDAO.php";

    if (!isset($msqli)) {
        $conexao = new Conexao("federacao_tenis");
        $msqli = $conexao->getConnection();
    }
    if (!isset($conexaoTenistas)) {
        $conexaoTenistas = new TenistasDAO($msqli);
    } 
    if (!isset($conexaoCategorias)) {
        $conexaoCategorias = new CategoriasDAO($msqli);
    }

?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="styles.css">
        <title>Insere Tenista</title>
    </head>
    <body>
        <h2>Inserir Tenista</h2>

        <form action="index.php" method="post">
            <input type="hidden" name="addTenista" value=true/>
            <input type="hidden" name="page" value="listaDeTenistas"/>

            <table class="border max-width">
                <tr>
                    <td class="width-2sevenths">
                        <label>Nome Completo:</label>
                    </td>
                    <td>
                        <input type="text" name="tenistaNome"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Data de Nascimento:</label>
                    </td>
                    <td>
                        <input type="date" name="tenistaDataNascimento"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Sexo:</label>
                    </td>
                    <td>
                        <table>
                            <tr>
                                <td class="no-border">
                                    <input class="no-width" id="sexoM" type="radio" name="tenistaSexo" value="0" checked=true/>
                                    <label for="sexoM">Masculino</label>
                                </td>
                                <td class="no-border">
                                    <input class="no-width" id="sexoF" type="radio" name="tenistaSexo" value="1"/>
                                    <label for="sexoF">Feminino</label>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Categoria:</label>
                    </td>
                    <td>
                        <select name="tenistaCategoria">
                            <?php

                                $categorias = $conexaoCategorias->getAll();
                                foreach ($categorias as $categoria) {

                                    $categoriaId = $categoria->get_id();
                                    $categoriaNome = $categoria->get_nome();
                                    ?>
                                    <option value="<?php echo $categoriaId ?>"><?php echo $categoriaNome ?></option>";
                                    <?php
                                }
                            ?>
                        </select>
                    </td>
                </tr>
            </table>
            <br/>
            <input class="max-width" type="submit">
        </form>
    </body>
</html>