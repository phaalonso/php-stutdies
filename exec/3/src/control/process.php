<?php

require_once('./dbControl.php');
require_once('../model/Usuario.php');
require_once('./ControleUsuario.php');

if (isset($_POST['nome']) && isset($_POST["senha"])) {
	if (strlen($_POST["nome"]) > 0) {
		if (strlen($_POST["senha"]) > 0) { 
			$controler= new ControleUsuario();

			$usr = new Usuario();
			$usr->setNome($_POST['nome']);
			$usr->setSenha($_POST['senha']);

			$result = $controler->login($usr);

			if (sizeof($result) == 0) {
				echo json_encode([
					"error" => "Usuario nao encontrado"
				]);
				http_response_code(400);
				exit();
			} else {
				if ($usr->getSenha() === $result[0]["senha"]) {
					session_start();
					$_SESSION["usuario"] = $usr;

					echo json_encode([
						"message" => "Usuario logado"
					]);
				} else {
					http_response_code(401);
					echo json_encode([
						"error" => "Senha errada"
					]);
				}
			}
		} else {
			echo json_encode([
				"error" => "Informe a senha",
				"missing" => ["senha"]
			]);
			http_response_code(400);
		}
	} else {
		$mising = ["nome"];
		$message = "Informe o nome";
		if (strlen($_POST["senha"]) === 0) {
			array_push($mising, "senha");
			$message = "Informe o nome e a senha";
		}
		
		echo json_encode([
			"error" => $message, 
			"missing" => $mising
		]);
		http_response_code(400);
	}
} else {
	http_response_code(400);
}


