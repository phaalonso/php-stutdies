<?php

namespace model;

/*
* @property int $id
* @property string $nome
* @property string $telefone
* @property string $endereco
* @property string $cidade
* @property string $uf
* @property string $cep
* @property string $email
* @property string $senha
*/
class Aluno {
	private int $id;
	private string $nome;
	private string $telefone;
	private string $endereco;
	private string $cidade;
	private string $uf;
	private string $cep;
	private string $email;
	private string $senha;

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
		  $this->telefone,
		  $this->endereco,
		  $this->cidade,
		  $this->uf,
		  $this->cep,
		  $this->email,
		  $this->senha
	  );
	}

}
