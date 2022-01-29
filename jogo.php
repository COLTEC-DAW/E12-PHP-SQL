<?php

    class Jogo{
        private Tenista $t_1, $t_2;
        private int $t_1_pontuacao, $t_2_pontuacao;
        private string $campeonato_nome;
        private string $campeonato_data;
        private string $quadra_endereco;
        private string $quadra_tipo;
        private int $publico;

        function __construct($t_1, $t_2, $t_1_pontuacao, $t_2_pontuacao, $campeonato_nome, $campeonato_data, $quadra_endereco, $quadra_tipo, $publico){
            $this->t_1 = $t_1;
            $this->t_2 = $t_2;
            $this->t_1_pontuacao = $t_1_pontuacao;
            $this->t_2_pontuacao = $t_2_pontuacao;
            $this->campeonato_nome = $campeonato_nome;
            $this->campeonato_data = $campeonato_data;
            $this->quadra_endereco = $quadra_endereco;
            $this->quadra_tipo = $quadra_tipo;
            $this->publico = $publico;
        }

        function echoJogo(){
            echo "<div class='jogo-card'><h2>$this->campeonato_nome</h2>
            <p>$this->campeonato_data | $this->quadra_endereco, $this->quadra_tipo</p>
            <p>$this->publico Espectadores</p>";
            echo "<table>
                <tr>
                    <td>"; $this->t_1->echoTenista(); echo "</td>
                    <td class='score'>$this->t_1_pontuacao</td>
                </tr>
                <tr>
                    <td id='versus'>X</td>
                </tr>
                <tr>
                    <td>"; $this->t_2->echoTenista(); echo"</td>
                    <td class='score'>$this->t_2_pontuacao</td>
                </tr>
            </table></div>";
        }
    }
?>