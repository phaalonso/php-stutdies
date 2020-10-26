<?php

namespace model;

/*
 * @property int $cdgo 
 * @property string $nome 
 * @property float $preco 
 * @property int $qtde 
 */
class Produto {
	private int $cdgo;
	private string $nome;
	private float $preco;
	private int $qtde;

	public function __get($name) {
		return $this->$name;
	}

	public function __set($name, $value) {
		if (!is_null($name)) {
			$this->$name = $value;
		}
	}

	public function toArray() {
		return array(
			"cdgo" => $this->cdgo,
			"nome" => $this->nome,
			"preco" => $this->preco,
			"qtde" => $this->qtde
		);
	}
}
