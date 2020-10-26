<?php

/*
 * Receba os dados do usuario e o redirecione para a proxima pasta
 * Caso não tenha recebido os dados irá redirecionalo para a pagina de login
 */

session_start();

$nome = $_POST["nome"];
$senha = $_POST["senha"];

if (isset($nome) && isset($senha)) {
	$_SESSION["data"] = [
		"nome" => $nome,
		"senha" => $senha
	];

	header("Location: ./info.php");
} else {
	header("Location: ./form.html");
}

exit();
