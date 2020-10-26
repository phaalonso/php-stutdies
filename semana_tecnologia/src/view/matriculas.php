<?php

namespace view;

require_once("config.php");
use controllers\ControllerMatricula;

if (session_status() === PHP_SESSION_NONE) {
	session_start();
}

if ($_SERVER["REQUEST_METHOD"] === "GET") {
	$con = new ControllerMatricula;
	
	if(isset($_GET["semana"])){
		if (isset($_SESSION["usuario"])) {
			if (isset($_GET["atividade"]) && isset($_GET["semana"])) {
				$res = $con->selectBySemanaAndAtividade($_GET["semana"], $_GET["atividade"]);
			} else {
				// Usada para preenchar matriculas realizadas
				$semanaId = $_GET["semana"];
				$userId = $_SESSION["usuario"]["id"];

				$res = $con->selectByUserAndSemana($userId, $semanaId);
			}
			echo json_encode($res);
		} else {
			echo json_encode(["error" => "Voce precisa estar logado"]);
		}
	} else {
		$res = $con->selectAll();		
		echo json_encode($res);
	}
} else if ($_SERVER["REQUEST_METHOD"] === "DELETE") {
	$post_data = file_get_contents('php://input');
	$data = json_decode($post_data, true);

	$id = $data["id"];

	$con = new ControllerMatricula;
	$res = $con->deleteById($id);
	print_r($res);
	if (!$res) {
	  http_response_code(400);
	}
} else {
	http_response_code(400);
}
