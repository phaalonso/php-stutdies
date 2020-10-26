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
</head>
<body>
	<div class="container">
	  <?php require('../utils/nav.php') ?>
	  <h5>DashBoard</h5>

	  <div style="display: grid; grid-gap: 10px; grid-auto-rows: auto; ">
		<a href="alunos.php">
		  <div class="card" style="width: 18rem;">
			<h5 class="card-title">Alunos</h5>
		  </div>
		</a>
		<a href="semana.php">
		  <div class="card" style="width: 18rem;">
			<h5 class="card-title">Semana</h5>
		  </div>
		</a>

		<a href="matriculas.php">
		  <div class="card" style="width: 18rem;">
			<h5 class="card-title">Matricula</h5>
		  </div>
		</a>

		<a href="atividades.php">
		  <div class="card" style="width: 18rem;">
			<h5 class="card-title">Atividades</h5>
		  </div>
		</a>
	  </div>
	</div>
</body>
</html>
