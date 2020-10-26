<?php

namespace db;

class Conexao extends \PDO {

	public function __construct() {
		parent::__construct(
			"mysql:dbname=prova;host=localhost:3306", //dbtype:dbname=name;host=hostaddr:port
			"ifsp",  //user
			"ifsp"   //password
		);
	}

	public function query($raw, $params = array()) {
		$stmt = $this->prepare($raw);
		//if (count($params) > 0) {
			//$this->atribuirParametros($stmt, $params);
		//}

		$stmt->execute($params);
		return $stmt;
	}

	public function atribuirParametros(\PDOStatement $statment, array $params) {
		foreach($params as $key => $value) {
			//echo $key . " " . $value . "<br/>";
			$statment->bindParam($key, $value);
		}
	}

	public function select(String $rawQuery, $params = array()) {
		$stmt = $this->query($rawQuery, $params);
		return $stmt->fetchAll(\PDO::FETCH_ASSOC);
	}
}
