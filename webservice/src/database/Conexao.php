<?php

namespace database;

use PDO;

class Conexao extends PDO {
	/*
	 * Create connection with database and prepare exceptions
	 */
	public function __construct() {
		parent::__construct('mysql:host=localhost:3306;dbname=webservice',
			'ifsp', 'ifsp', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
		);
	}
	

	/*
	 * Run a query in database
	 */
	public function query($raw, $params = array()) {
		$stmt = $this->prepare($raw);

		$stmt->execute($params);
		return $stmt;
	}

	/*
	 * Run a select all like statment
	 */
	public function findAll(String $rawQuery, $params = array()) {
		$stmt = $this->query($rawQuery, $params);
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	public function findOne(String $rawQuery, $params = array()) {
		$stmt = $this->query($rawQuery, $params);
		return $stmt->fetch(PDO::FETCH_ASSOC);
	}

}
