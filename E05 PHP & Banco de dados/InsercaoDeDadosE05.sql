USE DawE05;

/*Inserção de Dados*/

	/*Categorias*/
INSERT INTO categorias (nome) VALUES ("categoria_ex_1");
INSERT INTO categorias (nome) VALUES ("categoria_ex_2");
INSERT INTO categorias (nome) VALUES ("categoria_ex_3");

SELECT * FROM categorias;

	/*Quadras*/
INSERT INTO quadras (tipo, endereco) VALUES ("Areia", "rua_ex_01");
INSERT INTO quadras (tipo, endereco) VALUES ("Terra", "rua_ex_02");
INSERT INTO quadras (tipo, endereco) VALUES ("Concreto", "rua_ex_03");

SELECT * FROM quadras;

	/*Tenistas*/
INSERT INTO tenistas(nome, data_nascimento, sexo, categorias_id) 
	VALUES ("tenista_ex_1", NOW(), 0, 1);
INSERT INTO tenistas(nome, data_nascimento, sexo, categorias_id) 
	VALUES ("tenista_ex_2", NOW(), 1, 2);
INSERT INTO tenistas(nome, data_nascimento, sexo, categorias_id) 
	VALUES ("tenista_ex_3", NOW(), 0, 3);
INSERT INTO tenistas(nome, data_nascimento, sexo, categorias_id) 
	VALUES ("tenista_ex_4", NOW(), 1, 1);

SELECT * FROM tenistas;

	/*Campeonatos*/
INSERT INTO campeonatos(nome, edicao, data_realizacao, premiacao) 
	VALUES ("champ_01", "primeira", NOW(), 5000.00);

SELECT * FROM campeonatos;

	/*Jogos*/
INSERT INTO jogos(tenista_01_id, tenista_02_id, campeonatos_id, publico, pontuacao_tenista_01, pontuacao_tenista_02, quadras_id)
	VALUES (1, 2, 1, 200, 9, 11, 1);
INSERT INTO jogos(tenista_01_id, tenista_02_id, campeonatos_id, publico, pontuacao_tenista_01, pontuacao_tenista_02, quadras_id)
	VALUES (3, 2, 1, 250, 11, 7, 2);
    
SELECT * FROM jogos;