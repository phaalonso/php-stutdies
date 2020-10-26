<?php

namespace controller;

use db\Conexao;
use model\Numero;

class NumeroController extends Conexao {

	public function writeLine(Numero $num) {
		$ar = $num->toArray();

		$stmt = $this->prepare("INSERT INTO numeros(id, numeros) VALUES (:id, :numeros)");
		$stmt->execute($ar);
	}
}
