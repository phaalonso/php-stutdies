<?php

use controller\NumeroController;
use model\Numero;

require "config.php";

$controller = new NumeroController;

$file = fopen("ALEATORIO.TXT", "r");

while(($linha = fgets($file)) && strpos($linha, '#') === false) {
	$num = new Numero;
	$num->id = intval(substr($linha, 0, 2));
	$num->numeros = substr($linha, 3);

	$controller->writeLine($num);
}

fclose($file);
