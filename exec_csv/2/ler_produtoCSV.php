<?php


use controller\ControllerProduto;
use model\Produto;

require "config.php";

// Ler arquivo csv e persistir seus dados

$controleProduto = new ControllerProduto;

$csv_name = "produtos.csv";

if (is_file($csv_name)) {
	try {
		$file = fopen($csv_name, "r");

		$cabecalho_string = fgetcsv($file);
		$cabecalho = str_getcsv($cabecalho_string[0], ";");
		//print_r($cabecalho);
		//echo "<br/>";

		while (($string = fgetcsv($file, 0, "|")) !== FALSE) {
			//print_r($string);
			//echo "<br/>";
			$linha = str_getcsv($string[0], ";");
			//var_dump($linha);
			//echo "<br/>";

			$p = new Produto;
			$p->cdgo = intval($linha[0]);
			$p->nome = $linha[1];
			$p->preco = floatval($linha[2]);
			$p->qtde = intval($linha[3]);
			
			$controleProduto->persist($p);
		}
		fclose($file);
		echo "Banco de dados preenchido";
	} catch (PDOException $ex) {
		echo "Erro no PDO ;( <br/>";
		echo $ex->getMessage();
	}
} else {
	echo "Arquivo não encontrado";
}
