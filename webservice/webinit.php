<?php

function message($sucesso=true, $mensagem=null, $dados=array()) {
	header('Content-Type: application/json; charset=utf-8');
	echo json_encode([
		'sucesso' => $sucesso,
		'mensagem' => $mensagem,
		'dados' => $dados
	]);
}
