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
    email varchar(150),
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
    id_paciente int,
    id_medica int,
    tipo varchar(30),
    dia date,
    hora time,
    descricao varchar(1500),
    valor float,
    status varchar(15),
    CONSTRAINT fk_id_paciente_procedimentos FOREIGN KEY (id_paciente) REFERENCES Pacientes(id),
    CONSTRAINT fk_id_medica_procedimentos FOREIGN KEY (id_medica) REFERENCES Medicas(id)
);

create table Produtos(
    id int primary key auto_increment,
    nome varchar(80),
    quantidade float,
    descricao varchar(500),
);

create table Fornecedores(
    id int primary key auto_increment,
    nome varchar(80),
    telefone char(11),
    cpf_cnpj varchar(15),
    id_produto int,
    CONSTRAINT fk_id_produto_fornecedores FOREIGN KEY (id_produto) REFERENCES Produtos(id)
);














