<?php

/*
 * Apague o diretório com todo o seu conteudo, incluindo pastas
 */
function apagar_pasta($dir) {
	if (is_dir($dir)) {
		$files = scandir($dir);

		$processed_files = array_diff($files, array(".", ".."));

		foreach($processed_files as $file_name) {
			$path = $dir.DIRECTORY_SEPARATOR.$file_name;

			if (!is_dir($path)) {
				unlink($path);
			} else {
				apagar_pasta($path);
			}
		}

		rmdir($dir);
		return true;
	} 
	return false;
} 

$flag = apagar_pasta("imagens");
if ($flag)
	echo "Pasta apagada";
else
	echo "Pasta nao foi apagada";
