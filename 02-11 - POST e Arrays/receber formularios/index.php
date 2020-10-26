<?php
	# var_dump($_POST);
	echo "<table border='1'><tr>";
	echo "<th>Nome</th><th>Idade</th><th>Endereco</th><th>Cidade</th></tr><tr>";
	foreach($_POST as $valor)
		echo "<td>{$valor}</td>";
	echo "</tr></table>";
	echo "<a href='formulario.html'>Voltar ao formulario</a>";
?>