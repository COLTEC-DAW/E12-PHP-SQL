-- Criação do banco de dados
CREATE SCHEMA `federacao_tenis`;

-- Selecionando o banco de dados
USE `federacao_tenis`;

-- Criação da tabela de categorias
CREATE TABLE categoria(
	Id INT NOT NULL,
    Nome VARCHAR(45) NOT NULL,
    
    CONSTRAINT Id_pk PRIMARY KEY (Id)
);

-- Criação da tabela das quadras
CREATE TABLE quadra(
	Id INT NOT NULL,
    Tipo VARCHAR(45) NOT NULL,
    Endereco VARCHAR(45) NOT NULL,
    
    CONSTRAINT Id_pk PRIMARY KEY (Id)
);

-- Criação da tabela de campeonatos
CREATE TABLE campeonato(
	Id INT NOT NULL,
    Nome VARCHAR(45) NOT NULL,
	Edicao VARCHAR(45) NOT NULL,
    Data_realizacao DATETIME NOT NULL,
	Premiacao DECIMAL(10,2) NOT NULL,
    
    CONSTRAINT Id_pk PRIMARY KEY (Id)
);

-- Criação da tabela de tenistas
CREATE TABLE tenista(
	Id INT NOT NULL,
    Nome VARCHAR(45) NOT NULL,
    Data_nascimento DATETIME NOT NULL,
    Sexo BIT NOT NULL,
    Id_Categoria INT NOT NULL,
    
    CONSTRAINT Id_pk PRIMARY KEY (Id),
    CONSTRAINT Categoria_ID_fk FOREIGN KEY (Id_Categoria) REFERENCES categoria(Id)
);

-- CRiação da tabela de jogos
CREATE TABLE jogo(
	Publico INT NOT NULL,
    Pontuacao_tenista_01 INT NOT NULL,
    Pontuacao_tenista_02 INT NOT NULL,
    Id_Quadra INT NOT NULL,
    Id_Campeonato INT NOT NULL,
    Id_Tenista_01 INT NOT NULL,
    Id_Tenista_02 INT NOT NULL,
    
    CONSTRAINT Quadra_ID_fk FOREIGN KEY (Id_Quadra) REFERENCES quadra(Id),
    CONSTRAINT Campeonato_ID_fk FOREIGN KEY (Id_Campeonato) REFERENCES campeonato(Id),
	CONSTRAINT Tenista_01_ID_fk FOREIGN KEY (Id_Tenista_01) REFERENCES tenista(Id),
    CONSTRAINT Tenista_02_ID_fk FOREIGN KEY (Id_Tenista_02) REFERENCES tenista(Id)
);