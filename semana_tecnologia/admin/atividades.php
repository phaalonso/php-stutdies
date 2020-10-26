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
			$('table').on('click', 'tr td .delete', function (e) {
				const idAtividadeee = $(e.target).attr('id');
				console.log(idAtividadeee);
				$.ajax({
					url: '../src/view/atividades.php',
					type: 'DELETE',
					data: JSON.stringify({idAtividadeee}),
					success: (data => {
						console.log(data);
						$(`tr[id=${idAtividadeee}]`).remove()	
					}),
					error: (e) => {alert('Nao foi possivel')}
				});
			});
			$.get('../src/view/atividades.php', function (data) {
				data = JSON.parse(data);
				console.log(data);
				data.map(a => {
					const date = new Date(a.data);
					$('tbody').append(`
						<tr id="${a.id}">
							<th>${a.id}</th>
							<td>${a.id_semana}</td>
							<td>${a.nome}</td>
							<td>${date.toLocaleDateString('pt-BR')}</td>
							<td>${a.carga_horaria}</td>
							<td><button id="${a.id}" class="btn btn-danger delete">X</button></td>
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
	<div class="container">
  <?php require("../utils/nav.php") ?>
	  <h1>Atividades</h1>
		<a href="cadastro_atividades.php">
			<button class="btn btn-success">
				Cadastrar atividades 
			</button>
		</a>
		<!--
		-<span>Alunos</span>
	    -<div class="mb-3">
	    -  <label for="nome" class="form-label">Nome</label>
	    -  <input type="text" name="nome" class="form-control" id="nome">
	    -</div> 
	    -->

		<table class="table">
		  <thead>
			<tr>
			  <th scope="col">Id</th>
			  <th scope="col">Id semana</th>
			  <th scope="col">Nome</th>
			  <th scope="col">Data</th>
			  <th scope="col">Carga horaria</th>
			  <th scope="col"></th>
			</tr>
		  </thead>
		  <tbody>
		  </tbody>
		</table>
	</div>
</body>
</html>
