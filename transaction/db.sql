CREATE TABLE Produto(
	id INT auto_increment,
	nome varchar(50) NOT NULL,
	qtd INT NOT NULL,
	preco DECIMAL NOT NULL,
	PRIMARY KEY (id)
);

CREATE TABLE Venda(
	id INT auto_increment,
	precoTotal DECIMAL(10, 2) NOT NULL,
	PRIMARY KEY (id)
);

CREATE TABLE ItemVenda(
	idProduto INT,
	idVenda INT,
	qtd INT NOT NULL,
	precoProduto DECIMAL(10, 2) NOT NULL,
    PRIMARY KEY (idProduto, idVenda),
	FOREIGN KEY (idProduto) REFERENCES Produto(id),
	FOREIGN KEY (idVenda) REFERENCES Venda(id)
);

INSERT INTO Produto(id, nome, qtd, preco) VALUEs
	(1, "Pão", 100, 5.0),
	(2, "Pão de queijo", 30, 6.0),
	(3, "Feijoada", 10, 10);
