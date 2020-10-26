<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<form method="POST" enctype="multipart/form-data">
		<label for="arquivo">Arquivo</label>
		<input type="file" name="arquivo" id="arquivo">

		<button type="submit">Enviar</button>
	</form>

	<?php
		if($_SERVER["REQUEST_METHOD"] === "POST") {
			$file = $_FILES["arquivo"];
			var_dump($_FILES);

			if ($file["error"]) {
				throw new Exception("Error: ".$file["error"]);
			}

			$dirUploads = "upload";
			if (!is_dir($dirUploads)) {
				mkdir($dirUploads);
			}

			$destino = $dirUploads.DIRECTORY_SEPARATOR.$file["name"];
			if(move_uploaded_file($file["tmp_name"], $destino)) {
				echo "Upload realizado";
			} else {
				throw new Exception("Não foi possível enviar");
			}
		}

	?>
</body>
</html>
