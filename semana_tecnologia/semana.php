<?php

require('config.php');
use controllers\ControllerSemana;

$con = new ControllerSemana;
$semana = $con->selectAll();
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
	  $(document).ready(function() {
		  $.get("src/view/semana.php", function(data, status) {
			  console.log(data);
			  const lista = $('.lista-semana');
			  JSON.parse(data).map(at => {
				var dateInicio = new Date(at.dataInicio).toLocaleDateString('pt-BR');
				var dateFim = new Date(at.dataInicio).toLocaleDateString('pt-BR');
				var element = `
				  <div class="card" style="width: 18rem;"> 
					<div class="card-body">
					  <h5 class="card-title">${at.nome}</h5>
					  <h6 class="card-subtitle mb-2 text-muted">${dateInicio}</h6>
					  <h6 class="card-subtitle mb-2 text-muted">${dateFim}</h6>
					  <p>${at.curso}</p>
					</div>
				  </div>`; 
				  lista.append(element);
				
			}); 
		  }); 
 		});
	</script>

	<style>
	  .atividade {
		width: 300px;
		height: 150px;
		padding: 5px;
		margin: 10px;
		border-radius: 16px;
		background-color: greenyellow;
	  }
	  
	  .form-select {
		width: 300px;
	  }
	</style>
</head>
<body>
  <div class="container">
  <?php require("utils/nav.php") ?>
	<h1>Semanas</h1>
	<div class="lista-semana" style="display: flex; flex-direction: column;"></div>

  </div>
</body>
</html>
