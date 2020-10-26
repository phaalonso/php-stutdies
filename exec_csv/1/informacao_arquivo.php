<?php

$dir = "imagens";

// Lista os arquivos dentro de um diretório
$files = scandir($dir);

$data = array();

// Removendo o "." e ".."
$files = array_diff($files, array(".", ".."));

foreach ($files as $key) {
	$file_name = $dir.DIRECTORY_SEPARATOR.$key;

	$info = pathinfo($file_name);
	$info["size"] = filesize($file_name);
	$info["modificado"] = date("d/m/Y H:i:s", filemtime($file_name));
	$info["url"] = "http://localhost/manipulacao_arquivos/".$file_name;

	array_push($data, $info);
}

echo(json_encode($data, JSON_UNESCAPED_SLASHES));
