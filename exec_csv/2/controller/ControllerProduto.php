<?php
namespace controller;

use model\Produto;

class ControllerProduto extends \PDO {

	public function __construct() {
		parent::__construct('mysql:host=localhost:3306;dbname=produto_csv', 'ifsp', 'ifsp');
		$this->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
	}

	public function persist(Produto $p) {
		$value = $p->toArray();

		$stmt = $this->prepare("INSERT INTO Produto(cdgo, nome, preco, qtde) VALUES (:cdgo, :nome, :preco, :qtde)");
		$stmt->execute($value);
	}

	public function findAll() {
		$stmt = $this->prepare("SELECT * FROM Produto");

		return $stmt->fetchObject("model\Produto");
	}

}
