<?php

	session_start();
	
	$_SESSION['nome'] = 'Pedro Alonso';

	$_SESSION['dados'] = [
		"user" => "teste",
		"password" => "ifsp"
	];

	echo("A sessão foi criada");

?>
