<?php
	
	// Cria uma sessão
	session_start();

	// Verifica se nome esta armazenado na sessao
	if (isset($_SESSION["nome"])) {
		echo($_SESSION["nome"]);
		echo("<br>");
		echo($_SESSION["dados"]["login"]);
		echo("<br>");
		echo($_SESSION["dados"]["senha"]);
	
		echo("<br>");
		echo(session_id());

		//session_unset();
	
		// Tempo limite da sessao
		echo(session_cache_expire());

		// Destroi a sessão, limpa variaveis, limpa tudo
		session_destroy();
	} else {
		echo("Variaveis da sessão não existe!");
	}
