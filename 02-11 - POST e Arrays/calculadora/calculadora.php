<?php
	function somar($n1, $n2){
		return $n1 + $n2;
	}
	
	function subtrair($n1, $n2){
		return $n1 - $n2;
	}
	
	function multiplicar($n1, $n2){
		return $n1 * $n2;
	}
	
	function dividir($n1, $n2){
		if($n2 == 0)
			return "Divisao por zero!!";
		return $n1 / $n2;
	}

	# var_dump($_POST);
	$n1 = intval($_POST["n1"]);
	$n2 = intval($_POST["n2"]);
	
	switch($_POST["op"]){
	case '+':
		echo somar($n1, $n2);
		break;
	case '-':
		echo subtrair($n1, $n2);
		break;
	case '*':
		echo multiplicar($n1, $n2);
		break;
	case '/':
		echo dividir($n1, $n2);
		break;
	default:
		echo "Erro na pagina";
	}
	echo "</br><a href=index.html>Voltar a calculadora</a>";
?>