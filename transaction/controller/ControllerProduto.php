<?php

namespace controller;

use controller\db\Conexao;
use model\Produto;

class ControllerProduto extends Conexao {

	public function findAll() {
		return $this->select("SELECT * FROM Produto");
	}

	public function findKey(int $id) {
		if (is_int($id)) {
			$params = array(":id" => $id);

			$stmt = $this->prepare("SELECT * FROM Produto WHERE id=:id");
			$stmt->execute($params);

			return $stmt->fetchObject("model\Produto");
		}
	}

	public function create(Produto $p) {
		$valor = $p->toArray();

		$stmt = $this->prepare("INSERT INTO Produto(id, nome, qtd, preco) VALUES (:id, :nome, :qtd, :preco)");
		$res = $stmt->execute($valor);
		echo $res;
	}

	public function edit(Produto $p) {
		$valor = $p->toArray();

		$stmt = $this->query("UPDATE Produto SET 
			nome=:nome, 
			qtd=:qtd, 
			preco=:preco 
			WHERE id=:id", $valor);
	}

	public function delete(Produto $p) {
		if (!is_null($p->id)) {
			$stmt = $this->prepare("DELETE FROM Produto WHERE id=:id");
			$res = $stmt->execute(array("id" => $p->id));	
			echo $res;
		}
	}
}
