<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] === "GET") {
	if (isset($_SESSION["usuario"])) {
		session_destroy();
		
		header("Location: ../../index.php");	
	} else
	  http_response_code(400);
}
?>
