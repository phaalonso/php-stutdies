<?php
require_once '../model/Usuario.php';

session_start();

if(isset($_SESSION["usuario"])) {
	echo 'Bem vindo usuario!';
} else {
	header('Location: ../../login.html');
}
?>
