<?php

require("config.php");
use controllers\ControllerAluno;
use model\Aluno;

if ($_SERVER["REQUEST_METHOD"] === "GET") {
	$con = new ControllerAluno;
	$res = $con->selectAll();
	echo json_encode($res);
} else if ($_SERVER["REQUEST_METHOD"] === "DELETE") {
	$post_data = file_get_contents('php://input');
	$data = json_decode($post_data, true);

	$id = $data["id"];

	try {
	  $con = new ControllerAluno; 
	  $res = $con->delete($id);
	  if (!$res) {
		  http_response_code(400);
	  } 
	} catch (Exception $e) {
		echo $e->getMessage();
		echo $e->getTraceAsString();
		http_response_code(404);
	}

} else if ($_SERVER["REQUEST_METHOD"] === "POST") {
	$post_data = file_get_contents('php://input');
	$data = json_decode($post_data, true);

	$aluno = new Aluno;
	$aluno->nome = $data["nome"];
	$aluno->uf = strtoupper($data["uf"]);
	$aluno->cep = $data["cep"];
	$aluno->email = $data["email"];
	$aluno->senha = $data["senha"];
	$aluno->cidade = $data["cidade"];
	$aluno->telefone = $data["telefone"];
	$aluno->endereco = $data["endereco"];

	try {
	  $controle = new ControllerAluno;
	  $res = $controle->persist($aluno);
	  if (!$res) {
		  http_response_code(400);
	  }
	} catch (Exception $e) {
		http_response_code(400);
		echo $e->getMessage();
		echo $e->getTraceAsString();
	}
} else
	http_response_code(400);
