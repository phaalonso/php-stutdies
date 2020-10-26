<?php

	session_start();

	if(isset($_SESSION['nome'])) {
		echo('Função session_abort() desfaz todas as alterações feitas na sessão');
		echo('<br>');
		echo('É possivel notar que mesmo estando trocando a variavel nome, ao dar refresh na pagina ele volta para o anterior');
		echo('<br>');
		echo('<br>');

		// Tenta modificar a sessão mas aborta o processo
		echo('Nome:' . $_SESSION['nome']);
		echo('<br>');

		$_SESSION['nome'] = 'Joao Pedro';
		echo('Novo nome:' . $_SESSION['nome']);
		echo('<br>');
		
		// Essa função desfaz todas as alterações e cancela a sessão
		session_abort();

	} else {
		echo('Sessao nao existe');
	}


?>
