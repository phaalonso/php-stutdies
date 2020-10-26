<?php

namespace model;

use DateTime;

/*
* @property int $id
* @property string $nome
* @property string $dataInicio;
* @property string $dataFim;
* @property string $ativa;
* @property string $curso;
*/
class Semana {
	private int $id;
	private string $nome;
	private string $dataInicio;
	private string $dataFim;
	private bool $ativa;
	private string $curso;
  
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
			$this->id,
			$this->nome,
			$this->dataInicio,
			$this->dataFim,
			$this->ativa,
			$this->curso
		);
	}

}
