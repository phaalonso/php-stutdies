<?php

namespace controller;

use controller\db\Conexao;
use model\ItemVenda;

class ControllerItemVenda extends Conexao {

	public function findAll() {
		return $this->select("SELECT * FROM ItemVenda");
	}

	public function findKey(int $id) {
		if (is_int($id)) {
			$params = array(":id" => $id);
			return $this->select("SELECT * FROM ItemVenda WHERE id=:id", $params);
		}
	}

	public function create(ItemVenda $v) {
		$valor = $v->toArray();

		$stmt = $this->prepare("INSERT INTO ItemVenda(id, nome, qtd, precoTotal) VALUES (:id, :nome, :qtd)");
		$res = $stmt->execute($valor);
		echo $res;
	}

	public function edit(ItemVenda $v) {
		$valor = $v->toArray();

		$stmt = $this->query("UPDATE ItemVenda SET 
			nome=:nome, 
			qtd=:qtd,
			precoTotal=:precoTotal
			WHERE id=:id", $valor);
	}

	public function delete(ItemVenda $v) {
		if (!is_null($v->id)) {
			$stmt = $this->prepare("DELETE FROM ItemVenda WHERE id=:id");
			$res = $stmt->execute(array("id" => $v->id));	
			echo $res;
		}
	}
}
