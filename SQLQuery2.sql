USE E12;

INSERT INTO categorias (nome) VALUE ("Iniciante");
INSERT INTO categorias (nome) VALUE ("Intermediario");
INSERT INTO categorias (nome) VALUE ("Avançado");


INSERT INTO tenistas(nome, data_nascimento, sexo, categoria_id) VALUES ("Bruna", NOW(), "F", 2);

INSERT INTO tenistas(nome, data_nascimento, sexo, categoria_id) VALUES ("Bryan", NOW(), "M", 3);

INSERT INTO tenistas(nome, data_nascimento, sexo, categoria_id) VALUES ("Marcia", NOW(), "F", 1);

INSERT INTO quadras (tipo, endereco) VALUES ("Saibro","Rua Patati 123");
INSERT INTO quadras (tipo, endereco) VALUES ("Sintético","Rua Patata 321");
INSERT INTO quadras (tipo, endereco) VALUES ("Piso Errante","Rua Palhacinho 000");

INSERT INTO campeonatos(nome,edicao,data_realizacao,premiacao) VALUES ("Wimbledon",
"1ª",NOW(),250.000);

INSERT INTO jogos (tenista_01_id,tenista_02_id, campeonatos_id,publico,pontuacao_tenista_01, pontuacao_tenista_02,quadras_id) 
VALUES (1,2,1,250,35,50,3);

INSERT INTO jogos (tenista_01_id,tenista_02_id, campeonatos_id,publico,pontuacao_tenista_01, pontuacao_tenista_02,quadras_id) 
VALUES (2,3,1,300,90,25,2);