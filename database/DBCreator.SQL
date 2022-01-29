CREATE DATABASE federacao_tenista;
USE federacao_tenista;

CREATE TABLE categorias(
	id INT AUTO_INCREMENT,
	nome VARCHAR(45) NOT NULL,
	PRIMARY KEY(id)	
);
CREATE TABLE tenistas(
	id INT AUTO_INCREMENT,
	nome VARCHAR(150) NOT NULL,
    data_nascimento DATE NOT NULL,
    sexo ENUM ('m','f') NOT NULL,
    categorias_id INT ,
    
    PRIMARY KEY(id),
    CONSTRAINT tenistas_categorias_fk FOREIGN KEY(categorias_id)
		REFERENCES categorias (id)
);

CREATE TABLE quadras(
	id INT AUTO_INCREMENT,
	tipo VARCHAR(45) NOT NULL,
	endereco VARCHAR(45) NOT NULL,
	PRIMARY KEY(id)	
);
CREATE TABLE campeonatos(
	id INT AUTO_INCREMENT,
	nome VARCHAR(150) NOT NULL,
	edicao VARCHAR(45),
	data_realizacao DATETIME NOT NULL,
	premiacao DECIMAL(10,2) NOT NULL,
	PRIMARY KEY(id)	
);
CREATE TABLE jogos(
	tenista_01_id INT,
	tenista_02_id INT,
	campeonatos_id int,
	publico INT NOT NULL,
	pontuacao_tenista_01 INT NOT NULL,
	pontuacao_tenista_02 INT NOT NULL,
	quadras_id INT NOT NULL,

	PRIMARY KEY (tenista_01_id, tenista_02_id, campeonatos_id),
	CONSTRAINT fk_jogos_tenistas_01 FOREIGN KEY(tenista_01_id) REFERENCES tenistas(id),
	CONSTRAINT fk_jogos_tenistas_02 FOREIGN KEY(tenista_02_id) REFERENCES tenistas(id),
	CONSTRAINT fk_jogos_campeonatos FOREIGN KEY(campeonatos_id) REFERENCES campeonatos(id),
	CONSTRAINT fk_jogos_quadras FOREIGN KEY(quadras_id) REFERENCES quadras(id)
);