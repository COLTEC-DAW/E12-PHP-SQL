INSERT INTO categorias (nome) 
VALUE ("iniciante");

INSERT INTO categorias (nome) 
VALUE ("amador");

INSERT INTO categorias (nome) 
VALUE ("profissional");


INSERT INTO tenistas(nome, data_nascimento, sexo, categorias_id) VALUES ("Jemaf", NOW(), 'm',
(SELECT id FROM categorias WHERE nome='profissional'));

INSERT INTO tenistas(nome, data_nascimento, sexo, categorias_id) VALUES ("João", NOW(), 'm',
(SELECT id FROM categorias WHERE nome='amador'));

INSERT INTO tenistas(nome, data_nascimento, sexo, categorias_id) VALUES ("Montadon", NOW(), 'f',
(SELECT id FROM categorias WHERE nome='amador'));

INSERT INTO quadras (tipo, endereco) 
VALUES ("Areia","Rua do amanhã, 490");

INSERT INTO quadras (tipo, endereco) 
VALUES ("Aberta","Rua pontos emDAW, 1.6");

INSERT INTO quadras (tipo, endereco) 
VALUES ("Fechada","Rua do ontem, 31");

INSERT INTO campeonatos(nome,edicao,data_realizacao,premiacao) 
VALUES ("Mundial","15ª",NOW(),2.50);

INSERT INTO jogos (tenista_01_id,tenista_02_id,
campeonatos_id,publico,pontuacao_tenista_01,
pontuacao_tenista_02,quadras_id) 
VALUES (1,2,1,50,2,0,3);

INSERT INTO jogos (tenista_01_id,tenista_02_id,
campeonatos_id,publico,pontuacao_tenista_01,
pontuacao_tenista_02,quadras_id) 
VALUES (3,1,1,30,10,4,2);

SELECT tenistas.nome, tenistas.sexo, categorias.nome ,quadras.tipo, jogos.publico FROM tenistas JOIN categorias
ON tenistas.categorias_id = categorias.id
JOIN quadras
JOIN jogos ON tenistas.id = jogos.tenista_01_id OR tenistas.id = jogos.tenista_02_id
GROUP BY tenistas.nome;