<?php

namespace clientes;

class cliente {
	private $nome;
	private $idade;

	public function __construct(){
	}

	public function __set($nome, $valor) {
		echo 'set<br>';
		$this->$nome = $valor;
	}

	public function __get($nome) {
		echo 'get<br>';
		return $this->$nome;
	}

	public function __toString() {
		return $this->nome . " " . $this->idade . " ";
	}

}

?>
