<?php

	$link = "http://vfmaziero.com.br/images/foto.jpg";

	$conteudo = file_get_contents($link);

	$parse = parse_url($link);

	$file_name = basename("parse['path']");

	$file = fopen($file_name, "w+");
	fwrite($file, $conteudo);

	fclose($file);

?>
<img src="<?=$file_name?>">
