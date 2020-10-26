<?php

use controllers\ControllerAtividades;
use controllers\ControllerMatricula;

require("config.php");
if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["atividade"]) && isset($_GET["semana"])) {
	$atividadeId = $_GET["atividade"];
	$semanaId = $_GET["semana"];

	$con = new ControllerAtividades;
	$conM = new ControllerMatricula;
	$atividade = $con->selectOne($atividadeId, $semanaId);

	$matriculas = $conM->selectBySemanaAndAtividade($semanaId, $atividadeId);

} else {
	header("Location: atividades.php");
}
?> 
<!DOCTYPE html>
<html lang="pt-BR">
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
			const semana = <?php echo($atividadeId) ?>;
			const atividade = <?php echo($semanaId) ?>;
			//TODO
			$('table').on('click', 'tr td .delete', function (e) {
				const id = $(e.target).attr('id');
				console.log(id);
				$.ajax({
					url: '../src/view/matriculas.php',
					type: 'DELETE',
					data: JSON.stringify({atividade, id}),
					success: (data => {
						console.log(data);
						$(`tr[id=${id}]`).remove()	
					}),
					error: (e) => {alert('Nao foi possivel')}
				});
			});

			$.get('../src/view/matriculas.php', {atividade, semana}, function (data) {
				data = JSON.parse(data);
				console.log(data);
				data.map(a => {
					const date = new Date(a.data);
					$('tbody').append(`
					`);	
				});
			});
		});
	</script>
	<style>
		
	</style>
</head>
<body>
	<div class="container">
	  <?php require("../utils/nav.php") ?>
	<h1>Atividade <?php echo $atividade["nome"] ?></h1>
	  Data: <?php echo date('d/m/Y', strtotime($atividade["data"])) ?>
	<br/>
	Carga Horaria: <?php echo $atividade["carga_horaria"] ?>
	  <br/>
	  <br/>
		<h5 class="h5">Alunos matriculados:</h5>
		<table class="table">
		  <thead>
			<tr>
			  <th scope="col">Id</th>
			  <th scope="col">Nome</th>
			  <th scope="col">Telefone</th>
			  <th scope="col">Endereço</th>
			  <th scope="col">Cidade</th>
			  <th scope="col">Uf</th>
			  <th scope="col">Cep</th>
			  <th scope="col">Email</th>
			  <th scope="col"></th>
			</tr>
		  </thead>
		  <tbody>
			 <?php foreach($matriculas as $m): ?>
				 <tr id="<?= $m["id"] ?>">
					<th><?= $m["id"] ?></th>
					<td><?= $m["nome"] ?></td>
					<td><?= $m["telefone"] ?></td>
					<td><?= $m["endereco"] ?></td>
					<td><?= $m["cidade"] ?></td>
					<td><?= $m["uf"] ?></td>
					<td><?= $m["cep"] ?></td>
					<td><?= $m["email"] ?></td>
					<td><?= $m["data"] ?></td>
					<td><button id="<?= $m["id"] ?>" class="btn btn-danger delete">X</button></td>
				</tr>
			<?php endforeach;?>
		  </tbody>
		</table>
	</div>
</body>
</html>
