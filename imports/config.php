<?php

spl_autoload_register(function ($class_name) {
	$diretorio = array("model", "controllers", "util");

	foreach($diretorio as $key) {
		$filename = $key.DIRECTORY_SEPARATOR.$class_name.".php";

		if (file_exists($filename)) {
			require_once($filename);
		}
	}

}); 


