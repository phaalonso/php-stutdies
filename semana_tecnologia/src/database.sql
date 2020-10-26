CREATE DATABASE IF NOT EXISTS snct_pedro;
USE snct_pedro;

CREATE TABLE Semana(
	id INT PRIMARY KEY AUTO_INCREMENT,
	nome VARCHAR(50) NOT NULL,
	dataInicio DATE NOT NULL,
	dataFim DATE NOT NULL,
	ativa boolean NOT NULL DEFAULT 0,
	curso VARCHAR(50)
);

CREATE TABLE Aluno(
	id INT PRIMARY KEY AUTO_INCREMENT,
	nome VARCHAR(50) NOT NULL,
	telefone VARCHAR(13) NOT NULL,
	endereco VARCHAR(100) NOT NULL,
	cidade VARCHAR(50) NOT NULL,
	uf VARCHAR(2) NOT NULL,
	cep VARCHAR(9) NOT NULL,
	email VARCHAR(50) NOT NULL UNIQUE,
	senha VARCHAR(50) NOT NULL
);

CREATE TABLE Atividades(
	id INT AUTO_INCREMENT,
	id_semana INT,
	nome VARCHAR(50) NOT NULL,
	data DATETIME NOT NULL,
	carga_horaria INT NOT NULL,
	vagas INT NOT NULL,
	vagas_disponivel INT NOT NULL,
	PRIMARY KEY (id, id_semana),
	FOREIGN KEY (id_semana) REFERENCES Semana (id)
);

CREATE TABLE Matricula(
	id INT PRIMARY KEY AUTO_INCREMENT,
	data DATE NOT NULL,
	id_atividade INT NOT NULL,
	id_semana INT NOT NULL,
	id_aluno int NOT NULL,
	FOREIGN KEY (id_semana, id_atividade) REFERENCES Atividades (id_semana, id),
	FOREIGN KEY (id_aluno) REFERENCES Aluno (id),
	UNIQUE KEY a (id, id_atividade, id_semana, id_aluno)
);
