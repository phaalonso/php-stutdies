<?php

use controllers\ControllerAtividades;
use model\Atividades;

require_once("config.php");

$id_semana = 'a';
if ($_SERVER["REQUEST_METHOD"] === "POST") {
	$atividade = new Atividades;
	$atividade->id_semana = intval($_POST["id_semana"]);
	$atividade->nome = $_POST["nome"];
	$atividade->data = $_POST["data"];
	$atividade->cargaHoraria = intval($_POST["cargaHoraria"]);
	$atividade->vagas = intval($_POST["vagas"]);

	$controle = new ControllerAtividades;
	$controle->persist($atividade);
} elseif ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["semana"])) {
	$idSemana = intval($_GET["semana"]);
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
  <?php require("../utils/nav.php") ?>
	<form method="post">
		<h6 class="h6">Cadastro da Atividades</h6>

		<div class="mb-3">
		<label for="id_semana" class="form-label">Id semana</label>
		  <input type="text" name="id_semana" class="form-control" id="id_semana" <?php echo(isset($idSemana) ? 'value='.$idSemana.' readonly="true"' : "") ?>>
		</div> 

		<div class="mb-3">
		  <label for="nome" class="form-label">Nome</label>
		  <input type="text" name="nome" class="form-control" id="nome" required>
		</div> 

		<div class="mb-3">
		  <label for="data" class="form-label">Data</label>
		  <input type="date" name="data" class="form-control" id="endereco" required>
		</div> 

		<div class="mb-3">
		  <label for="cargaHoraria" class="form-label">Carga horaria</label>
		  <input type="number" name="cargaHoraria" class="form-control" id="cargaHoraria" required>
		</div>

		<div class="mb-3">
		  <label for="vagas" class="form-label">Vagas</label>
		  <input type="number" name="vagas" class="form-control" id="vagas" min="0" required>
		</div>
		
		<button type="submit" class="btn btn-primary" style="width: 100%;">Cadastrar</button>
	</form>
  </div>
</body>
</html>
