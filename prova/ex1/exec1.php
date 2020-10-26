<?php

$file = fopen("ALEATORIO.TXT", 'r');
$filtrado = fopen("FILTRADO.TXT", "w");

$registro = "PE3001059";

$num1 = substr($registro, 2, 2);
$num2 = substr($registro, 7);

echo "Num1: " . $num1;
echo "<br/>";
echo "Num2: " . $num2;

while(($linha = fgets($file))) {
	$pos1 = strpos($linha, $num1);
	$pos2 = strpos($linha, $num2);

	if (!($pos1 === false) && !($pos2 === false)) {
		fwrite($filtrado, $linha);
	}
}

fclose($file);
fclose($filtrado);
