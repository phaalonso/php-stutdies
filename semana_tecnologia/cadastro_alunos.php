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
					url: './src/view/alunos.php',
					type: 'POST',
					data: JSON.stringify(data),
					success: function (data) {
						$('.alert').attr('hidden', true);
						window.location.replace('logar.php');
					},
					error: function (data) {
						$('.alert').attr('hidden', false);
						console.log(data);
					}
				});
			});
		});
	</script>
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
  <?php require("utils/nav.php") ?>
	<form method="post">
		<h5 class="h5">Cadastro do Aluno </h6>

		<div class="mb-3">
		  <label for="nome" class="form-label">Nome</label>
		  <input type="text" name="nome" class="form-control" id="nome">
		</div> 

		<div class="mb-3">
		  <label for="telefone" class="form-label">Telefone</label>
		  <input type="tel" name="telefone" class="form-control" id="telefone" pattern="[0-9]{5}-?[0-9]{4}">
		</div> 

		<div class="mb-3">
		  <label for="endereco" class="form-label">Endereço</label>
		  <input type="text" name="endereco" class="form-control" id="endereco">
		</div> 

		<div class="mb-3">
		  <label for="cidade" class="form-label">Cidade</label>
		  <input type="text" name="cidade" class="form-control" id="cidade">
		</div>
		
		<div class="mb-3">
		  <label for="uf" class="form-label">UF</label>
		  <input type="text" name="uf" minlength="2" maxlength="2" class="form-control" id="uf">
		</div>

		<div class="mb-3">
		  <label for="cep" class="form-label">CEP</label>
		  <input type="text" name="cep" class="form-control" id="cep">
		</div>

		<div class="mb-3">
		  <label for="email" class="form-label">Email</label>
		  <input type="email" name="email" class="form-control" id="email">
		</div>

		<div class="mb-3">
		  <label for="senha" class="form-label">Senha</label>
		  <input type="password" name="senha" class="form-control" id="senha">
		</div>
		<button type="submit" class="btn btn-primary" style="width: 100%;">Cadastrar</button>
	</form>
  </div>
</body>
</html>
