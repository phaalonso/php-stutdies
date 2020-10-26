<?php

namespace controllers;

use database\Conexao;
use model\Atividades;

class ControllerAtividades extends Conexao {

	public function persist(Atividades $s) {
		$value = array(
		  'id_semana' => $s->id_semana,
		  'nome' => $s->nome,
		  'data' => $s->data,
		  'carga_horaria' => $s->cargaHoraria,
		  'vagas' => $s->vagas,
		  'vagas_disponivel' => $s->vagas
	  );

		$stmt = $this->prepare("INSERT INTO Atividades(id_semana, nome, data, carga_horaria, vagas, vagas_disponivel) VALUES (:id_semana, :nome, :data, :carga_horaria, :vagas, :vagas_disponivel)");
		$stmt->execute($value);
	}

	public function selectAll() {
		return $this->findAll("SELECT * FROM Atividades");
	}

	public function selectAllFromAtiva() {
		return $this->findAll("SELECT a.* FROM Atividades a JOIN Semana s ON (s.id = a.id_semana) WHERE ativa = true");
	}

	public function selectAllSemana(int $sid) {
		$res = $this->findAll("SELECT a.* FROM Atividades a JOIN Semana s ON (s.id = id_semana) WHERE s.id=:sid", [':sid' => $sid] );
		return $res;
	}

	public function selectOne(int $id_atividade, int $id_semana) {
		return $this->findOne("SELECT * FROM Atividades WHERE id=:id AND id_semana=:id_semana", ['id' => $id_atividade, 'id_semana' => $id_semana]);
	}

	public function delete(int $id) {
		$s = $this->prepare("DELETE FROM Atividades WHERE id=:id");
		return $s->execute(["id" => $id]);
	}
}
