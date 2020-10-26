<?php

namespace model;

/*
* @property int $id
* @property int $id_semana;
* @property string $nome;
* @property string $data;
* @property int $cargaHoraria;
* @property int $vagas;
* @property int $vagas_disponivel;
*/
class Atividades {
	private int $id;
	private int $id_semana;
	private string $nome;
	private string $data;
	private int $cargaHoraria;
	private int $vagas;
	private int $vagas_disponivel;

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
		  $this->id_semana,
		  $this->nome,
		  $this->data,
		  $this->cargaHoraria,
		  $this->vagas,
		  $this->vagas_disponivel
	  );
	}
}
