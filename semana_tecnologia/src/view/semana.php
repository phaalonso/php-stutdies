<?php

require("config.php");
use controllers\ControllerSemana;

if ($_SERVER["REQUEST_METHOD"] === "GET") {
	$con = new ControllerSemana;
	$res = $con->selectAll();
	echo json_encode($res);
} else if ($_SERVER["REQUEST_METHOD"] === "DELETE") {
	$post_data = file_get_contents('php://input');
	$data = json_decode($post_data, true);

	if (isset($data["id"])) {
		$con = new ControllerSemana;
		$res = $con->delete($data["id"]);
		if (!$res)
			http_response_code(400);
	} else {
		http_response_code(400);
	}
}
