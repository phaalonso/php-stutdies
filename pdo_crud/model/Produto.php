<?php 

namespace model;

/*
 * @property int $id
 * @property string $nome
 * @property int $quantidade
 */
class Produto {
	private int $id;
	private string $nome;
	private int $quantidade;

	public function __get($name) {
		return $this->$name;
	}

	public function __set($name, $value) {
		if(!is_null($value)) {
			$this->$name = $value;
		}
	}

}
