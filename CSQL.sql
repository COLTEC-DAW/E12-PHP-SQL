CREATE DATABASE tenisdosamigos;
    USE tenisdosamigos;

    CREATE TABLE categorias(

		    id INT AUTO_INCREMENT,
        nome VARCHAR(45),

        CONSTRAINT pk_categorias PRIMARY KEY(id)

    );

    CREATE TABLE tenistas(

            id INT AUTO_INCREMENT,
        nome VARCHAR(150),
        data_nascimento DATETIME,
        sexo BIT,
        categorias_id INT,

        CONSTRAINT pk_tenista PRIMARY KEY(id),
        CONSTRAINT fk_tenistas_categorias FOREIGN KEY(categorias_id) REFERENCES categorias(id)

    );

    CREATE TABLE quadras(

		    id INT AUTO_INCREMENT,
        tipo VARCHAR(45),
        endereco VARCHAR(45),

        CONSTRAINT pk_quadra PRIMARY KEY(id)	

    );

     CREATE TABLE campeonatos(

		    id INT AUTO_INCREMENT,
        nome VARCHAR(150),
        edicao VARCHAR(45),
        data_realizacao DATETIME,
        premiacao DECIMAL(10,2),

        CONSTRAINT pk_campeonato PRIMARY KEY(id)	

    );

     CREATE TABLE jogos(
         
		tenista_01_id INT,
        tenista_02_id INT,
        campeonatos_id INT,
        publico INT,
        pontuacao_tenista_01 INT,
        pontuacao_tenista_02 INT,
        quadras_id INT,

        CONSTRAINT pk_jogos PRIMARY KEY (tenista_01_id, tenista_02_id, campeonatos_id),
		CONSTRAINT fk_jogos_tenistas_01 FOREIGN KEY(tenista_01_id) REFERENCES tenistas(id),
        CONSTRAINT fk_jogos_tenistas_02 FOREIGN KEY(tenista_02_id) REFERENCES tenistas(id),
        CONSTRAINT fk_jogos_campeonatos FOREIGN KEY(campeonatos_id) REFERENCES campeonatos(id),
        CONSTRAINT fk_jogos_quadras FOREIGN KEY(quadras_id) REFERENCES quadras(id)
        
    );