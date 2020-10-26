<?php
	session_start();

	if (is_null($_SESSION["data"])) {
		echo('Voce não esta logado');
		exit();
	}

	$nome = $_SESSION["data"]["nome"];
	$senha = $_SESSION["data"]["senha"];
	//echo($nome);
	//echo($senha);
	//session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<h3> Seja bem vindo ao site </h3>
	Seu usuario é <?php echo($nome) ?>
	<br />
	Sua senha é <?php echo($senha) ?>
		
</body>
</html>
