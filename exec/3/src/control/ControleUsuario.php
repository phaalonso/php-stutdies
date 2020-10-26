<?php

class ControleUsuario {
	private $conexao;

	public function __construct() {
		$this->conexao = new Conexao();
	}

	public function login(Usuario $usuario) {
		$sql = "SELECT * FROM Usuario 
			WHERE nome = '{$usuario->getNome()}'";
		$res = $this->conexao->executeSelect($sql);

		return $res;
	}

	public function create(Usuario $usuario) {
		$sql = "INSERT INTO Usuario (nome, senha)
			VALUES (
				'{$usuario->getNome()}',
				'{$usuario->getSenha()}'
			)";
		return $this->conexao->execute($sql);
	}

	public function update(Usuario $usuario) {
		$sql = "UPDATE Usuario SET
			nome='{$usuario->nome}',
			senha='{$usuario->senha}'
		WHERE id = '{$usuario->id}'";
		
		$res = $this->conexao->execute($sql);
		echo $res;
	}

	public function remove(Usuario $usuario) {
		$sql = "DELETE FROM Usuario WHERE id = '{$usuario->getId}'";

		$res = $this->conexao->execute($sql);
		echo $res;
	}

	public function getById(int $id) {
		$sql = "SELECT * FROM Usuario WHERE id = '{$id}'";
		$res = $this->conexao->executeSelect($sql);

		return $res;
	}

	public function getAll() {
		return $this->conexao->executeSelect("SELECT * FROM Usuario");
	}
}
