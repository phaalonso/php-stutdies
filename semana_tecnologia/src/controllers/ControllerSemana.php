<?php

namespace controllers;

use database\Conexao;
use model\Semana;

class ControllerSemana extends Conexao {

	public function persist(Semana $s) {
		$value = array(
			'nome' => $s->nome,
			'dataInicio' => $s->dataInicio,
			'dataFim' => $s->dataFim,
			'curso' => $s->curso
		);

		$stmt = $this->prepare("INSERT INTO Semana (nome, dataInicio, dataFim, curso) VALUES (:nome, :dataInicio, :dataFim, :curso)");
		$stmt->execute($value);
	}

	public function selectAll() {
		return $this->findAll("SELECT * FROM Semana");
	}

	public function selectOne(int $id) {
	  return $this->findOne("SELECT * FROM Semana WHERE id=:id", ['id' => $id]);
	}

	public function selectAtiva() {
		return $this->findOne("SELECT * FROM Semana WHERE ativa = true;");
	}

	public function atualizarAtiva(int $id, bool $estado) {
		$stmt = $this->prepare("UPDATE Semana SET ativa = :ativa WHERE id = :id");
		return $stmt->execute(["id" => $id, "ativa" => $estado ? 1 : 0]);
	}

	public function tornarAtiva(int $id) {
		$seman_anterior = $this->selectAtiva();

		if ($seman_anterior) 
			$this->atualizarAtiva($seman_anterior["id"], false);

		return $this->atualizarAtiva($id, true);
	}

	public function delete(int $id) {
		$s = $this->prepare("DELETE FROM Matriculas WHERE id_semana = :id");
		$s->execute(['id' => $id]);

		$s1 = $this->prepare("DELETE FROM Atividades WHERE id_semana = :id");
		$s1->execute(['id' => $id]);

		$s3 = $this->prepare("DELETE FROM Semana WHERE id=:id");
		return $s3->execute(["id" => $id]);
	}
}
