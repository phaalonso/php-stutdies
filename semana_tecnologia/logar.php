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
	<!---Jquery -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<!-- Carrega o script, para converter .serializeArray() para o formato json  -->
	<script src="./serializeArrayToJson.js"></script>
	
	<script>
		$(document).ready(function() {
			$('form').submit(function(e) {
				e.preventDefault();

				const data = serializeArrayToJson($('form').serializeArray());
				console.log(data);

				$.ajax({
					url: 'src/view/logar.php',
					type: 'POST',
					data: JSON.stringify(data),
					success: function (data) {
						$('.alert').attr('hidden', true);
						window.location.replace('index.php');
					},
					error: function (data) {
						$('.alert').attr('hidden', false);
						console.log(data);
					}
				})
				
			});
		});	
	</script>
	<style> 
	  form  {
		width: 100%;
		max-width: 330px;
		padding: 15px;
		margin: auto;
	  }

	  .a {
		width: 100%;
		margin-bottom: 5px;
	  }
	</style>
</head>
<body>
  <div class="container">
	<?php require("utils/nav.php") ?>
	<form>
		<div class="mb-3">
		  <label for="usuario" class="form-label">Usuário</label>
		  <input type="email" name="email" class="form-control" id="email" placeholder="email@dominio.com" />
		</div> 

		<div class="mb-3">
		  <label for="senha" class="form-label">Senha</label>
		  <input type="password" name="senha" class="form-control" id="senha" />
		</div> 

		<div class="alert alert-danger" hidden="true" role="alert">
			Email ou senha incorretos
		</div>
		<button type="submit" class="btn btn-primary a">Logar</button>
		
		<a class="btn btn-primary a" href="cadastro_alunos.php">
		Cadastrar-se
		</a>
	</form>
  </div>
</body>
</html>
