<?php

$file_name = "imagens".DIRECTORY_SEPARATOR."log.txt";

$file = fopen($file_name, "w+");
fprintf($file, "Arquivo de log");
fclose($file);
