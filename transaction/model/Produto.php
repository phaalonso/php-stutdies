<?php 

namespace model;

/*
 * @property int $id
 * @property string $nome
 * @property int $quantidade
 * @property float $preco
 */
class Produto {
	private int $id;
	private string $nome;
	private int $quantidade;
	private float $preco;

	public function __get($name) {
		return $this->$name;
	}

	public function __set($name, $value) {
		if(!is_null($value)) {
			$this->$name = $value;
		}
	}

	public function toArray() {
		return array(
			"id" => $this->id,
			"nome" => $this->nome,
			"qtd" => $this->quantidade,
			"preco" => $this->preco
		);
	}

}
