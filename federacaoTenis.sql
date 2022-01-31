CREATE DATABASE federacao_tenis;
USE federacao_tenis;

CREATE TABLE categorias(
	id INT,
    nome VARCHAR(45) NOT NULL,
    CONSTRAINT categorias_pk PRIMARY KEY(id)
);
CREATE TABLE quadras(
	id INT,
    tipo VARCHAR(45) NOT NULL,
	endereco VARCHAR(45) NOT NULL,
    CONSTRAINT quadras_pk PRIMARY KEY (id)
);
CREATE TABLE tenistas(
	id INT,
    nome VARCHAR(150) NOT NULL,
    data_nascimento DATETIME NOT NULL,
    sexo BIT NOT NULL,
    categorias_id INT NOT NULL,
    CONSTRAINT tenistas_pk PRIMARY KEY (id),
    CONSTRAINT tenistas_categorias_fk FOREIGN KEY (categorias_id)
		REFERENCES categorias(id)
);
CREATE TABLE campeonatos(
	id INT,
    nome VARCHAR(150) NOT NULL,
    edicao VARCHAR(45),
    data_realizacao DATETIME NOT NULL,
    premiacao DECIMAL(10, 2) NOT NULL,
    CONSTRAINT campeonatos_pk PRIMARY KEY (id)
);
CREATE TABLE jogos(
	tenista_01_id INT,
    tenista_02_id INT,
    campeonatos_id INT,
    publico INT NOT NULL,
    pontuacao_tenista_01 INT NOT NULL,
    pontuacao_tenista_02 INT NOT NULL,
    quadras_id INT NOT NULL,
    CONSTRAINT jogos_pk PRIMARY KEY (tenista_01_id, tenista_02_id, campeonatos_id),
    CONSTRAINT jogos_tenistas_1_fk FOREIGN KEY (tenista_01_id)
		REFERENCES tenistas(id),
    CONSTRAINT jogos_tenistas_2_fk FOREIGN KEY (tenista_02_id)
		REFERENCES tenistas(id),
    CONSTRAINT jogos_campeonatos_fk FOREIGN KEY (campeonatos_id)
		REFERENCES campeonatos(id),
	CONSTRAINT jogos_quadras_fk FOREIGN KEY (quadras_id)
		REFERENCES quadras(id)
);