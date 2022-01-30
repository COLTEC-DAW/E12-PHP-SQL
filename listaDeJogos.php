<?php

    include_once "conexao.php";

    include_once "federacao_tenis_categoriasDAO.php";
    include_once "federacao_tenis_tenistasDAO.php";
    include_once "federacao_tenis_quadrasDAO.php";
    include_once "federacao_tenis_campeonatosDAO.php";
    include_once "federacao_tenis_jogosDAO.php";

    if (!isset($msqli)) {
        $conexao = new Conexao("federacao_tenis");
        $msqli = $conexao->getConnection();
    }
    if (!isset($conexaoCampeonatos)) {
        $conexaoCampeonatos = new CampeonatosDAO($msqli);
    }
    if (!isset($conexaoJogos)) {
        $conexaoJogos = new JogosDAO($msqli);
    }
    if (!isset($conexaoQuadras)) {
        $conexaoQuadras = new QuadrasDAO($msqli);
    }
    if (!isset($conexaoTenistas)) {
        $conexaoTenistas = new TenistasDAO($msqli);
    }
    if (!isset($conexaoCategorias)) {
        $conexaoCategorias = new CategoriasDAO($msqli);
    }

    function tableTenista($tenista, $conexaoCategorias) {
        
        $tenistaNome = $tenista->get_nome();
        $tenistaDataNascimento = $tenista->get_data_nascimento();
        $tenistaSexo = $tenista->get_sexo();
        
        $tenistaCategoria = $conexaoCategorias->get($tenista->get_categorias_id());
        $tenistaCategoriaNome = $tenistaCategoria->get_nome();
        ?>
        <table>
            <tr>
                <th><?php echo $tenistaNome ?></th>
            </tr>
            <tr>
                <td>
                    <table>
                        <tr>
                            <td class="width-3sevenths"><?php echo $tenistaCategoriaNome ?></td>
                            <td class="width-1seventh"><?php echo ($tenistaSexo == 0 ? "M" : "F") ?></td>
                            <td class="width-3sevenths"><?php echo $tenistaDataNascimento ?></td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        <?php
    }

?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="styles.css">
        <title>Jogos</title>
    </head>
    <body>
        <h2>Lista de Jogos</h2>
        <table class="border max-width">
            <?php

                $campeonatos = $conexaoCampeonatos->getAll();

                foreach ($campeonatos as $campeonato) {

                    $campeonatoId = $campeonato->get_id();
                    $campeonatoNome = $campeonato->get_nome();
                    $campeonatoEdicao = $campeonato->get_edicao();
                    $campeonatoDataRealizacao = $campeonato->get_data_realizacao();
                    $campeonatoPremiacao = $campeonato->get_premiacao();
                    ?>
                    <tr>
                        <td>
                            <table>
                                <tr>
                                    <th>
                                        <table>
                                            <tr>
                                                <th class="border width-5sevenths"><?php echo $campeonatoNome ?></th>
                                                <th class="border width-2sevenths">EDIÇÃO <?php echo $campeonatoEdicao ?? "ÚNICA" ?></th>
                                            </tr>
                                            <tr>
                                                <td>R$<?php echo $campeonatoPremiacao ?></td>
                                                <td><?php echo $campeonatoDataRealizacao ?></td>
                                            </tr>
                                        </table>
                                    </th>
                                </tr>

                                <?php 

                                    $jogos = $conexaoJogos->getAllFromCampeonato($campeonatoId);

                                    $i = 0;
                                    foreach ($jogos as $jogo) {
                                        $i++;

                                        $jogoPublico = $jogo->get_publico();
                                        
                                        $jogoTenista01 = $conexaoTenistas->get($jogo->get_tenista_01_id());
                                        $jogoTenista02 = $conexaoTenistas->get($jogo->get_tenista_02_id());
                                        $jogoPontuacaoTenista01 = $jogo->get_pontuacao_tenista_01();
                                        $jogoPontuacaoTenista02 = $jogo->get_pontuacao_tenista_02();
                                        
                                        $jogoQuadra = $conexaoQuadras->get($jogo->get_quadras_id());
                                        $jogoQuadraTipo = $jogoQuadra->get_tipo();
                                        $jogoQuadraEndereco = $jogoQuadra->get_endereco();
                                        ?>
                                        <tr>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td>
                                                            <table>
                                                                <tr>
                                                                    <th>JOGO <?php echo "$i" ?></th>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <table>
                                                                            <tr>
                                                                                <td class="border width-5sevenths"><?php echo $jogoQuadraEndereco ?></td>
                                                                                <td class="border width-2sevenths">Quadra: <?php echo $jogoQuadraTipo ?></td>
                                                                            </tr>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <table>
                                                                <tr>
                                                                    <td class="width-3sevenths"><?php tableTenista($jogoTenista01, $conexaoCategorias) ?></td>
                                                                    <td><?php echo "$jogoPontuacaoTenista01 X $jogoPontuacaoTenista02" ?></td>
                                                                    <td class="width-3sevenths"><?php tableTenista($jogoTenista02, $conexaoCategorias) ?></td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                ?>
                            </table>
                        </td>
                    </tr>
                    <?php
                }
            ?>
        </table>
    </body>
</html>