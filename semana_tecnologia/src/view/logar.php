<?php
require("config.php");
use controllers\ControllerAluno;

session_start();
if ($_SERVER["REQUEST_METHOD"] === "POST") {
	$post_data = file_get_contents('php://input');
	$data = json_decode($post_data, true);
	if (isset($data["email"]) && isset($data["senha"])) {
		$con = new ControllerAluno;

		$email = $data["email"];
		$senha = $data["senha"];
		
		$res = $con->logar($email, $senha);
		if ($res) {
			$_SESSION["usuario"] = $res;
		} else
		  http_response_code(400);
	} else
	http_response_code(400);
}
?>
