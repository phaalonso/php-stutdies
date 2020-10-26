<?php
require("config.php");
use controllers\ControllerSemana;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
	if (isset($_POST["ativar"])) {
		$controller = new ControllerSemana;
		$controller->tornarAtiva(intval($_POST["ativar"]));
	}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Semana da Computação</title>
	<!-- Bootstrap and dependencies -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	<script>
		$(document).ready(function () { 
			$('table').on('click', 'tr td .delete', function (e) {
				const id = $(e.target).attr('id');
				console.log(id);
				$.ajax({
					url: '../src/view/semana.php',
					type: 'DELETE',
					data: JSON.stringify({id}),
					success: (data => {
						console.log(data);
						$(`tr[id=${id}]`).remove()	
					}),
					error: (e) => {alert('Nao foi possivel')}
				});
			});

			$.get('../src/view/semana.php', function (data) {
				data = JSON.parse(data);
				console.log(data);
				data.map(a => {
					$('tbody').append(`
						<tr id="${a.id}">
							<th>${a.id}</th>
							<td>${a.nome}</td>
							<td>${a.dataInicio}</td>
							<td>${a.dataFim}</td>
							<td>${(a.ativa === "1") ? "Sim" : "Não"}</td>
							<td>${a.curso}</td>
							<td>
								<div>
									<button id="${a.id}" class="btn btn-danger delete">🗑️</button>
									<a href="semana_detalhes.php?semana=${a.id}" class="btn btn-primary">🔎</a>
								<div>
							</td>
						</tr>
					`);	
				});
			});
		});
	</script>
	<style>
		
	</style>
</head>
<body>
  <div class="container" style="display: flex; flex-direction: column;">
  <?php require('../utils/nav.php') ?>
	  <h1>Semana</h1>
		<a href="cadastro_semana.php">
			<button class="btn btn-success">
				Cadastrar semana 
			</button>
		</a>

		<br/>

		<form action="" method="POST">
		  <div class="input-group mb-3">
			<div class="input-group-prepend">
			  <button  class="btn btn-outline-secondary" type="submit">Ativar semana</button>
			</div>
			<input type="number" class="form-control" placeholder="Id semana" aria-label="id semana" name="ativar" aria-describedby="basic-addon1" required>
		  </div>
		</form>

		<br/>

		<table class="table">
		  <thead>
			<tr>
			  <th scope="col">Id</th>
			  <th scope="col">Nome</th>
			  <th scope="col">Data inicial</th>
			  <th scope="col">Data fim</th>
			  <th scope="col">Ativa</th>
			  <th scope="col">Curso</th>
			  <th scope="col"></th>
			</tr>
		  </thead>
		  <tbody>
		  </tbody>
		</table>
	</div>
</body>
</html>
