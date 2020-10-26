<?php

	session_start();

	$_SESSION['nome'] = 'Pedro Alonso';

	$_SESSION['dados'] = [
		"login"=>"xxx", 
		"senha"=> "xxx"
	];

	echo("A sessao foi criada");

?>
