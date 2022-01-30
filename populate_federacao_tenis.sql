
use federacao_tenis;

insert into categorias (nome) values ("SUB15");
insert into categorias (nome) values ("SUB16");
insert into categorias (nome) values ("SUB17");
insert into categorias (nome) values ("SUB18");
insert into categorias (nome) values ("SUB25");

insert into tenistas (nome, data_nascimento, sexo, categorias_id) values (
	"Ekko",
    '1999-12-31',
    0,
    4
), (
	"Violet",
    '2000-03-04',
    1,
    4
), (
	"Pensive",
    '2010-09-12',
    1,
    1
), (
	"Geyson",
    '2008-06-09',
    0,
    1
);

insert into quadras (tipo, endereco) values (
	"Aberta",
    "Belo Horizonte - MG"
), (
	"Fechada",
    "Rio Branco - AC"
);

insert into campeonatos (nome, edicao, data_realizacao, premiacao) values (
	"O GRANDE CAMPEONATO DO SECULO",
    null,
    '2022-01-25',
    6969.69
);

insert into jogos (tenista_01_id, tenista_02_id, campeonatos_id, publico, pontuacao_tenista_01, pontuacao_tenista_02, quadras_id) values (
	1,
    2,
    1,
    100,
    5,
    7,
    1
), (
	3,
    4,
    1,
    69,
    6,
    9,
    2
);
