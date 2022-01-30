#drop database federacao_tenis;
create database federacao_tenis;

use federacao_tenis;

create table categorias (
	id int auto_increment not null,
    nome varchar(45) not null,
    
    constraint primary key (id)
);

create table tenistas (
	id int auto_increment not null,
    nome varchar(150) not null,
    data_nascimento date not null,
    sexo bit not null,
    categorias_id int not null,
    
    constraint primary key (id),
    constraint foreign key (categorias_id) references categorias (id)
);

create table quadras (
	id int auto_increment not null,
    tipo varchar(45) not null,
    endereco varchar(150) not null,
    
    constraint primary key (id)
);

create table campeonatos (
	id int auto_increment not null,
    nome varchar(45) not null,
    edicao varchar(45),
    data_realizacao datetime not null,
    premiacao decimal(10, 2),
    
    constraint primary key (id)
);

create table jogos (
	tenista_01_id int not null,
    tenista_02_id int not null,
    campeonatos_id int not null,
    publico int not null,
    pontuacao_tenista_01 int not null,
    pontuacao_tenista_02 int not null,
    quadras_id int not null,
    
    constraint primary key (tenista_01_id, tenista_02_id, campeonatos_id),
    constraint foreign key (tenista_01_id) references tenistas (id),
    constraint foreign key (tenista_02_id) references tenistas (id),
    constraint foreign key (campeonatos_id) references campeonatos (id),
    constraint foreign key (quadras_id) references quadras (id)
);
