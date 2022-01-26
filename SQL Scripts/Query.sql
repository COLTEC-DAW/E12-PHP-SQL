-- Selecionando o banco de dados
USE `federacao_tenis`;

-- Retornando os dados de todos os tenistas
SELECT Id, Nome, Data_nascimento FROM tenista;

-- Implemente uma página para todos listar os jogos cadastrados (deverão ser exibidos informações a respeito dos tenistas e das quadras).
SELECT jogo.Publico,jogo.Id_Campeonato, quadra.Tipo, quadra.Endereco, Tenista01.Nome, Pontuacao_tenista_01, Tenista02.Nome, Pontuacao_tenista_02 FROM jogo
JOIN tenista Tenista01 ON Tenista01.Id = jogo.Id_Tenista_01
JOIN tenista Tenista02 ON Tenista02.Id = jogo.Id_Tenista_02
JOIN quadra ON quadra.Id = jogo.Id_Quadra;

INSERT INTO tenista VALUES (0,"erik","19/01/2004",0,0);
INSERT INTO tenista VALUES (1,"Julia M","18/12/2003",1,0);
INSERT INTO categoria VALUES (0,"Sei lá");

INSERT INTO quadra VALUES(0,"Quadrada","Rua Zero Meia Zero");
INSERT INTO campeonato VALUES(0,"Peso não sei","22",NOW(),"10 real");
INSERT INTO jogo VALUES(50,0,2,0,0,0,1);
