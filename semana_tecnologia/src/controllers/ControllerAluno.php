<?php

namespace controllers;

use database\Conexao;
use model\Aluno;

class ControllerAluno extends Conexao {

	public function persist(Aluno $s) {
	  $value = array(
		  'nome' => $s->nome,
		  'telefone' => $s->telefone,
		  'endereco' => $s->endereco,
		  'cidade' => $s->cidade,
		  'uf' => $s->uf,
		  'cep' => $s->cep,
		  'email' => $s->email,
		  'senha' => $s->senha
	  );

		$stmt = $this->prepare("INSERT INTO Aluno(nome, telefone, endereco, cidade, uf, cep, email, senha) VALUES (:nome, :telefone, :endereco, :cidade, :uf, :cep, :email, :senha)");
		return $stmt->execute($value);
	}

	public function logar(String $email, String $senha) {
		return $this->findOne("SELECT * FROM Aluno WHERE email=:email AND senha=:senha", [':email' => $email, ':senha' => $senha]);	
	}


	public function selectAll() {
		return $this->findAll("SELECT * FROM Aluno");
	}

	public function selectOne(int $id) {
	  return $this->findOne("SELECT * FROM Aluno id=:id", ['id' => $id]);
	}

	public function delete(int $id) {
	  $s = $this->prepare("DELETE FROM Matricula WHERE id_aluno = :id");
	  $s->execute(["id" => $id]);

	  $s = $this->prepare("DELETE FROM Aluno WHERE id= :id");
	  return $s->execute(["id" => $id]);
	}

}
