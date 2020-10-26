<?php


namespace view;

require_once("config.php");
use controllers\ControllerAtividades;
use controllers\ControllerMatricula;
use model\Matricula;

if ($_SERVER["REQUEST_METHOD"] === "GET") {
	$controller = new ControllerAtividades;

	if (isset($_GET["semana"]) && ($id = intval($_GET["semana"]))) {
		$res = $controller->selectAllSemana($id);
		echo json_encode($res);
	} else {
		$res = $controller->selectAll();
		  echo json_encode($res);
	}
} else if ($_SERVER["REQUEST_METHOD"] === "POST"){
	session_start();
	if (isset($_SESSION["usuario"]) && isset($_SESSION["usuario"]["id"])) {
	  $sid = $_POST["idSemana"];
	  $aid = $_POST["idAtividade"];
	  $id = $_SESSION["usuario"]["id"];

	  $matricula = new Matricula;
	  $matricula->id_aluno = $id;
	  $matricula->id_semana = $sid;
	  $matricula->id_atividade = $aid;
	  $matricula->data = date('Y-m-d');

	  $con = new ControllerMatricula;
	  $status = $con->persist($matricula);

	  if (!$status) {
		  $error["message"] = "Não foi possivel adicionar a matricula";
		  echo json_encode($error);
		  http_response_code(400);
	  }
	} else {
		http_response_code(400);
	}
} else if ($_SERVER["REQUEST_METHOD"] === "DELETE") {
	session_start();
	$post_data = file_get_contents('php://input');
	$data = json_decode($post_data, true);

	if (isset($data["idAtividadeee"])) {
		$id = $data["idAtividadeee"];
		$con = new ControllerAtividades;
		$res = $con->delete($id);
		if (!$res) {
		  http_response_code(400);
		} else {
		  http_response_code(200);
		}
	} else {
		$id_semana = $data["idSemana"];
		$id_atividade = $data["idAtividade"];
		$id_aluno = $_SESSION["usuario"]["id"];

		$con = new ControllerMatricula;
		$con->delete($id_semana, $id_atividade, $id_aluno);
	}
}
