<?php

$dir = "imagens";

if (!is_dir("imagens")) {
	mkdir($dir);
	echo "Pasta criada";
} else {
	rmdir($dir);
	echo "Pasta existia, foi excluida";
}
