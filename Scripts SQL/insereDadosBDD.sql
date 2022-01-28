
INSERT INTO categorias (nome) VALUE ("júnior");
INSERT INTO categorias (nome) VALUE ("profissional");
INSERT INTO categorias (nome) VALUE ("aposentado");


INSERT INTO tenistas(nome, data_nascimento, sexo, categorias_id) VALUES ("Ivo", NOW(), 'm',
(SELECT id FROM categorias WHERE nome='profissional'));
INSERT INTO tenistas(nome, data_nascimento, sexo, categorias_id) VALUES ("João", NOW(), 'm',
(SELECT id FROM categorias WHERE nome='aposentado'));
INSERT INTO tenistas(nome, data_nascimento, sexo, categorias_id) VALUES ("Maria", NOW(), 'f',
(SELECT id FROM categorias WHERE nome='aposentado'));

INSERT INTO quadras (tipo, endereco) VALUES ("Grama","Rua Pitangui 733");
INSERT INTO quadras (tipo, endereco) VALUES ("Areia","Rua Bandeirantes 830");
INSERT INTO quadras (tipo, endereco) VALUES ("Concreto","Rua Rio de Janeiro 31");

INSERT INTO campeonatos(nome,edicao,data_realizacao,premiacao) VALUES ("grand slam",
"1ª",NOW(),1000.00);

INSERT INTO jogos (tenista_01_id,tenista_02_id,
campeonatos_id,publico,pontuacao_tenista_01,
pontuacao_tenista_02,quadras_id) VALUES (
1,2,1,50,0,0,2
);
INSERT INTO jogos (tenista_01_id,tenista_02_id,
campeonatos_id,publico,pontuacao_tenista_01,
pontuacao_tenista_02,quadras_id) VALUES (
1,3,1,30,10,10,3
);

SELECT t.nome, t.sexo, c.nome ,q.tipo, j.publico FROM tenistas t JOIN categorias c
ON t.categorias_id = c.id
JOIN quadras q
JOIN jogos j ON t.id = j.tenista_01_id OR t.id = j.tenista_02_id
GROUP BY t.nome;
