drop  database if exists UnicSteticCenter;
create database UnicSteticCenter;
use UnicSteticCenter;

create table Usuarios(
	id int primary key auto_increment,
    nome varchar(40),
    email varchar(150),
    senha varchar(80),
    nascimento date,
    cpf char(11) unique,
    telefone char(11),
    cidade varchar(80),
    rua varchar(80),
    numero_casa int,
    observacao varchar(254),
    is_adm boolean
);

insert into Usuarios(nome, email, senha, cpf, telefone, is_adm) values 
    ("Dr. Lara Martinelli","laram@usc.com",123,12345678999,"47931033632",1),
    ("Dr. Aurora Baker","aurorab@usc.com",456,13584699975,"47924732214",1),
    ("Dr. Malu Carter","maluc@usc.com",789,98765432199,"47938848504",1),
    ("Recepção","recepcao@usc.com",246,00000000000,"47937151868",1);
    
create table Consultas(
	id int primary key auto_increment,
    id_paciente int,
    id_medica int,
    dia date,
    hora time,
    observacao varchar(1500),
    habil boolean,
    valor float,
    status varchar(15),
    CONSTRAINT fk_id_paciente_consultas FOREIGN KEY (id_paciente) REFERENCES Usuarios(id),
    CONSTRAINT fk_id_medica_consultas FOREIGN KEY (id_medica) REFERENCES Usuarios(id)
);

create table Produtos(
    id int primary key auto_increment,
    nome varchar(80),
    quantidade float,
    medida varchar(30),
    descricao varchar(500)
);

create table Fornecedores(
    id int primary key auto_increment,
    nome varchar(80),
    telefone char(11),
    cpf_cnpj varchar(15),
    id_produto int,
    CONSTRAINT fk_id_produto_fornecedores FOREIGN KEY (id_produto) REFERENCES Produtos(id)
);



create table Procedimentos(
	id int primary key auto_increment,
    id_paciente int,
    procedimento varchar(30),
    id_medica int,
    dia date,
    hora time,
    id_produtos_usados int,
    observacao varchar(1500),
    valor float,
    status varchar(15) DEFAULT 'Pendente',
    CONSTRAINT fk_id_paciente_procedimentos FOREIGN KEY (id_paciente) REFERENCES Usuarios(id),
    CONSTRAINT fk_id_medica_procedimentos FOREIGN KEY (id_medica) REFERENCES Usuarios(id)
);
