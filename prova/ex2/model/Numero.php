<?php

namespace model;
class Numero {
	private int $id;
	private String $numeros;

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
			"id" => $this->id,
			"numeros" => $this->numeros
		);
	}
}
