-- Selecionando o banco de dados
USE `federacao_tenis`;

-- Inclusão de tenistas
-- incluidos em execução

-- Inclusão de categorias
INSERT INTO categoria VALUES (0,"Classe A");
INSERT INTO categoria VALUES (1,"Classe B");
INSERT INTO categoria VALUES (2,"Classe C");

-- Inclusão de quadras
INSERT INTO quadra VALUES(0,"SAIBRO","Rua 1 ");
INSERT INTO quadra VALUES(1,"PEQUENO DESLIZE","Rua 5");
INSERT INTO quadra VALUES(2,"SINTÉTICO","Rua 9");
INSERT INTO quadra VALUES(3,"EM CAMADAS","Rua 13");

-- Inclusão de campeonatos
INSERT INTO campeonato VALUES(0,"The Camp","22",NOW(),"10 real");
INSERT INTO campeonato VALUES(1,"The Tenis","11",NOW(),"20 real");

-- Inclusão de jogos
INSERT INTO jogo VALUES(50,0,2,0,0,0,1);
INSERT INTO jogo VALUES(50,8,3,1,1,2,4);
INSERT INTO jogo VALUES(200,14,18,0,0,2,1);