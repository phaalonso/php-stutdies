<?php

class Conexao {
	private $conexao;

	public function __construct() {
		$this->conexao = mysqli_connect("localhost:3306", "ifsp", "ifsp", "trabalho");
		mysqli_select_db($this->conexao, "trabalho");
		mysqli_set_charset($this->conexao, "utf8");
	}

	public function execute($sql) {
		return mysqli_query($this->conexao, $sql);
	}

	public function executeSelect($sql) {
		$res = $this->execute($sql);

		if ($res)
			return mysqli_fetch_all($res, MYSQLI_ASSOC);
		else
			return array();

	}
}
