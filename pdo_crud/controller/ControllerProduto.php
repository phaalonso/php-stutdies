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
			return $this->select("SELECT * FROM Produto WHERE id=:id", $params);
		}
	}

	public function create(Produto $p) {
		$valor = array(
			"id" => $p->id,
			"nome" => $p->nome,
			"qtd" => $p->quantidade
		);

		$stmt = $this->prepare("INSERT INTO Produto(id, nome, qtd) VALUES (:id, :nome, :qtd)");
		$res = $stmt->execute($valor);
		echo $res;
	}

	public function edit(Produto $p) {
		$valor = array(
			":id" => $p->id,
			":nome" => $p->nome,
			":qtd" => $p->quantidade
		);

		$stmt = $this->query("UPDATE Produto SET nome=:nome, qtd=:qtd WHERE id=:id", $valor);
	}

	public function delete(Produto $p) {
		if (!is_null($p->id)) {
			$stmt = $this->prepare("DELETE FROM Produto WHERE id=:id");
			$res = $stmt->execute(array("id" => $p->id));	
			echo $res;
		}
	}
}
