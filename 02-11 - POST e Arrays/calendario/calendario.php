<?php

function getNomeMes($mes){
	$meses = array("Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho",
		"Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro");
	return $meses[$mes];
}

function getNomeSemana($semana){
	$semanas = array("D", "S", "T", "Q", "Q", "S", "S");
	return $semanas[$semana];
}

function isAnoBissexto($ano){
	if(($ano % 4 == 0 && $ano % 100 != 0) || $ano % 400 == 0)
		return true;
	return false;
}

function imprimirLinhaSemanas(){
	echo "<tr>";
	for($i = 0; $i < 7; $i++)
		echo "<td style='font-weight: bold'>".getNomeSemana($i)."</td>";
	echo "</tr>";
}

function montarMes($mes, $semana, $ano){
	$meses30 = array(1, 3, 5, 8, 10);
	if($mes == 1){
		if(isAnoBissexto($ano))
			$dias = 29;
		else
			$dias = 28;
	}elseif(in_array($mes, $meses30)){
		$dias = 30;
	}else{
		$dias = 31;
	}
	
	$contagem = 0;
	
	echo "<td style='border: 1px solid black'><table style='border: 1px solid black; background-color: #C8D6F5'>";
	echo getNomeMes($mes);
	imprimirLinhaSemanas();
	
	if($semana != 0){
		echo "<tr>";
		for($i=0; $i<$semana; $i++){
			echo "<td>.</td>";
			$contagem++;
		}
	}
	
	for($i=0; $i<$dias; $i++){
		if($semana == 0)
			echo "<tr>";
		if($semana == 0 || $semana == 6)
			echo "<td style='color: #C42B2B'>".($i+1)."</td>";
		else
			echo "<td>".($i+1)."</td>";
		$contagem++;
		if($semana == 6)
			echo "</tr>";
		$semana = ($semana + 1) % 7;
	}
	
	if($semana != 0){
		for($i=$semana; $i<7; $i++){
			echo "<td>.</td>";
			$contagem++;
		}
		echo "</tr>";
	}
	
	$contagem = $contagem / 7;
	
	if($contagem == 5){
		echo "<tr>";
		for($i = 0; $i < 7; $i++)
			echo "<td>.</td>";
		echo "</tr>";
	}
	
	echo "</table></td>";
	
	return $semana;
}

function montarCalendario($ano){
	$semana = date('w', strtotime($ano.'-01-01'));
	
	echo "<table style='border: 1px solid black'>";
	echo "<tr><td><h2>Ano $ano</h2></td></tr>";
	for($i=0; $i<12; $i++){
		if($i % 3 == 0)
			echo "<tr>";
		$semana = montarMes($i, $semana, $ano);
		if($i % 3 == 2)
			echo "</tr>";
	}
	echo "</table>";
}

$ano = $_POST["ano"];
montarCalendario($ano);
echo "</br><a href=index.html>Voltar</a>";

?>