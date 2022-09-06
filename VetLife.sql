drop  database if exists Unic Stetic Center;
create database Unic Stetic Center;
use Unic Stetic Center;
create table Medicas(
	id int primary key auto_increment,
    usuario varchar(50) unique,
    senha varchar(50)
);

create table Pacientes(
	id int primary key auto_increment,
    nome varchar(50),
	ddd char(2),
    telefone char(11),
    cpf char(14) unique,
    email varchar(80),
    -- Endereço -----------------------
    cidade varchar(30),
    rua varchar(30),
    numero int
);

create table Pets(
	id int primary key auto_increment,
    nome varchar(40),
    idade int,
    nascimento date,
    raça varchar(50),
	especie varchar(50),
    peso double,
    sexo varchar(10),
    alergias varchar(254),
    observacao varchar(254),
    porte varchar(10),
    castramento boolean,
    id_responsavel int,
	CONSTRAINT fk_id_responsavel FOREIGN KEY (id_responsavel) REFERENCES Responsaveis(id)
);

create table Consultas(
	id int primary key auto_increment,
    id_pet int,
    id_med int,
    tipo varchar(30),
    dia date,
    hora time,
    descricao varchar(1500),
    status varchar(15),
    CONSTRAINT fk_id_pet_consultas FOREIGN KEY (id_pet) REFERENCES Pets(id),
    CONSTRAINT fk_id_med_consultas FOREIGN KEY (id_med) REFERENCES Usuarios(id)
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

create table Vacinas(
    id int primary key auto_increment,
    nome varchar(50);
);

create table Pets_Vacinados(
    id int primary key auto_increment,
    id_pet int,
    id_vacina int,
    CONSTRAINT fk_id_pet_vacina FOREIGN KEY (id_pet) REFERENCES Pets(id),
    CONSTRAINT fk_id_vacina FOREIGN KEY (id_vacina) REFERENCES Vacinas(id)
);
