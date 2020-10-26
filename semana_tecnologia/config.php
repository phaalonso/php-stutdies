<?php

spl_autoload_register(function ($class_name) {
	$class_name = str_replace("\\", DIRECTORY_SEPARATOR, $class_name);
	//echo "Class name: " . $class_name . "<br />";
	$dir_class = "src";

	$file_name = $dir_class . DIRECTORY_SEPARATOR . $class_name . ".php";
	if (file_exists($file_name)) {
		require_once($file_name);
	}

}); 
