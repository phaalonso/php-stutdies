<?php

session_start();

if (isset($_SESSION["usuario"])) {
	session_destroy();
} else {
	http_response_code(400);
}
