drop  database if exists UnicSteticCenter;
create database UnicSteticCenter;
use UnicSteticCenter;
create table Medicas(
	id int primary key auto_increment,
    usuario varchar(50) unique,
    senha varchar(50)
);

create table Pacientes(
	id int primary key auto_increment,
    nome varchar(40),
    senha varchar(80),
    idade int,
    cpf char(11) unique,
    telefone char(11),
    cidade varchar(80),
    rua varchar(80),
    numero_casa int,
    observacao varchar(254)
);

create table Procedimentos(
	id int primary key auto_increment,
    id_pet int,
    id_med int,
    tipo varchar(30),
    dia date,
    hora time,
    descricao varchar(1500),
    status varchar(15),
    CONSTRAINT fk_id_pet_procedimentos FOREIGN KEY (id_pet) REFERENCES Pets(id),
    CONSTRAINT fk_id_med_procedimentos FOREIGN KEY (id_med) REFERENCES Usuarios(id)
);