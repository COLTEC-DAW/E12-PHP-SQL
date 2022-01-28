-- Selecionando o banco de dados
USE `federacao_tenis`;

SELECT Id, Nome, Data_nascimento FROM tenista;

SELECT jogo.Publico,jogo.Id_Campeonato, quadra.Tipo, quadra.Endereco, Tenista01.Nome, Pontuacao_tenista_01, Tenista02.Nome, Pontuacao_tenista_02 FROM jogo
JOIN tenista Tenista01 ON Tenista01.Id = jogo.Id_Tenista_01
JOIN tenista Tenista02 ON Tenista02.Id = jogo.Id_Tenista_02
JOIN quadra ON quadra.Id = jogo.Id_Quadra;

SELECT * FROM campeonato;
SELECT * FROM categoria;
SELECT * FROM jogo;
SELECT * FROM quadra;
SELECT * FROM tenista;