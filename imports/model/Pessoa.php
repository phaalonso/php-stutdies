<?php

class Pessoa {
	private $nome;
	private $email;

	public function __get($name) {
		return $this->$name;
	}

	public function __set($name, $value) {
		$this->$name = $value;
	}

	public function __toString() {
		echo("TOP " . $this->nome . " " . $this->email. "<br>");
	}

}
