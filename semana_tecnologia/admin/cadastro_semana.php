<?php

//TODO transformar em js
use controllers\ControllerSemana;

require_once("config.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
	$semana = new \model\Semana;
	$semana->nome = $_POST["nome"];
	$semana->curso = $_POST["curso"];
	$semana->dataInicio = date('Y-m-d', strtotime($_POST["dataInicio"]));
	$semana->dataFim = date('Y-m-d',strtotime($_POST["dataFim"]));

	$controle = new ControllerSemana;
	$controle->persist($semana);
	header("Location: semana.php");
}

?>

<!DOCTYPE html>
<html lang="pt">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Semana da Computação</title>
	<!-- Bootstrap and dependencies -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>

	<style> 
	  form {
		width: 100%;
		max-width: 330px;
		padding: 15px;
		margin: auto;
	  }
	</style>
</head>
<body>
  <div class="container">
	<?php require('../utils/nav.php') ?>
	<br/>
	<form method="post">
		<h5 class="h5">Cadastro da semana</h6>

		<div class="mb-3">
		  <label for="nome" class="form-label">Nome</label>
		  <input type="text" name="nome" class="form-control" id="nome" placeholder="Nome">
		</div> 

		<div class="mb-3">
		  <label for="dataInicio" class="form-label">Data inicio</label>
		  <input type="date" name="dataInicio" class="form-control" id="data_inicio">
		</div> 

		<div class="mb-3">
		  <label for="dataFim" class="form-label">Data fim</label>
		  <input type="date" name="dataFim" class="form-control" id="data_fim">
		</div> 

		<div class="mb-3">
		  <label for="curso" class="form-label">Curso</label>
		  <input type="text" name="curso" class="form-control" id="curso">
		</div>
		
		<button type="submit" class="btn btn-primary" style="width: 100%;">Cadastrar</button>
	</form>
  </div>
</body>
</html>
