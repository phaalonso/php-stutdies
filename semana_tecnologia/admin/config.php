<?php
spl_autoload_register(function ($class_name) {
	$class_name = str_replace("\\", DIRECTORY_SEPARATOR, $class_name);
	// echo "Class name: " . $class_name . "<br />";
	$dir_class = "../src";
	//$diretorio = array("model", "controller", "util");

	//foreach($diretorio as $key) {
		//$filename = $key.DIRECTORY_SEPARATOR.$class_name.".php";
		//echo($filename . "<br/>");

		//if (file_exists($filename)) {
			//require_once($filename);
		//}
	//}
	//
	$file_name = $dir_class . DIRECTORY_SEPARATOR . $class_name . ".php";
	// echo $file_name;
	if (file_exists($file_name)) {
		require_once($file_name);
	}

}); 
