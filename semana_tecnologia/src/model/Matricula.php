<?php

namespace model;

/*
* @property int $id
* @property DateTime $data;
* @property int $id_atividade;
* @property int $id_semana;
* @property int $id_aluno;
*/
class Matricula {
	private int $id;
	private string $data;
	private int $id_atividade;
	private int $id_semana;
	private int $id_aluno;

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
		  $this->data,
		  $this->id_atividade,
		  $this->id_semana,
		  $this->id_aluno
	  );
	}

}
