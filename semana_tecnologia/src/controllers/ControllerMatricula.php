<?php

namespace controllers;

use database\Conexao;
use model\Matricula;

class ControllerMatricula extends Conexao {

	public function persist(Matricula $s) {
		$value = array(
		  'data' => $s->data,
		  'id_atividade' => $s->id_atividade,
		  'id_semana' => $s->id_semana,
		  'id_aluno' => $s->id_aluno
	  );

		$stmt = $this->prepare("INSERT INTO Matricula(data, id_atividade, id_semana, id_aluno) VALUES (:data, :id_atividade, :id_semana, :id_aluno)");
		$res = $stmt->execute($value);

		$stmt2 = $this->prepare("UPDATE Atividades set vagas_disponivel = vagas_disponivel - 1 WHERE id = :id_atividade AND id_semana = :id_semana");
		$stmt2->execute(['id_atividade' => $s->id_atividade, 'id_semana' => $s->id_semana]);

		return $res;
		
	}

	public function selectAll() {
		return $this->findAll("SELECT * FROM Matricula");
	}

	public function selectByUserAndSemana(int $user, int $semana) {
		return $this->findAll("SELECT * FROM Matricula WHERE id_aluno=:id_aluno AND id_semana=:semana", ["id_aluno" => $user, "semana" => $semana]);
	}

	public function selectBySemanaAndAtividade(Int $semana, Int $atividade) {
		return $this->findAll("SELECT a.*, m.data FROM Matricula m JOIN Aluno a on (a.id = m.id_aluno) WHERE m.id_atividade = :atividade AND m.id_semana = :semana", ['atividade' => $atividade, 'semana' => $semana]);
	}

	public function selectOne(int $id) {
	  return $this->findOne("SELECT * FROM Matricula WHERE id=:id", ['id' => $id]);
	}

	public function deleteById(int $id) {
		$stmt = $this->prepare("DELETE FROM Matricula WHERE id=:id");
		return $stmt->execute(["id"=>$id]);
	}

	public function delete(int $id_semana, int $id_atividade, int $id_aluno) {
		$value = ["id_semana" => $id_semana, "id_atividade" => $id_atividade, "id_aluno" => $id_aluno];

		$stmt = $this->prepare("DELETE FROM Matricula WHERE id_semana=:id_semana AND id_atividade=:id_atividade AND id_aluno=:id_aluno");
		$stmt->execute($value);

		$stmt2 = $this->prepare("UPDATE Atividades set vagas_disponivel = vagas_disponivel + 1 WHERE id = :id_atividade AND id_semana = :id_semana");
		$stmt2->execute(['id_atividade' => $id_atividade, 'id_semana' => $id_semana]);
	}

}
