<?php

require('config.php');
session_start();

use controllers\ControllerAtividades;
use controllers\ControllerMatricula;
use controllers\ControllerSemana;

$con = new ControllerSemana;
$conA = new ControllerAtividades;
$conM = new ControllerMatricula;

$ativa = $con->selectAtiva();

if ($ativa) {
	$atividade = $conA->selectAllFromAtiva();

	if (isset($_SESSION["usuario"])) {
		$matriculas = $conM->selectByUserAndSemana(intval($_SESSION["usuario"]), intval($ativa["id"]));
		$mat = [];
		foreach($matriculas as $m) {
			array_push($mat, $m["id_atividade"]);
		}
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
	  $(document).ready(function() {
		// Adicionar atividades
		$('.lista-atividades').on('click', '.add-atividade', function (e) {
		  const idAtividade = $(e.target).attr('id');
		  const idSemana = <?= $ativa["id"] ?>;

		  console.log("Add atividade", idAtividade, idSemana);
		  $.post('src/view/atividades.php', {idAtividade, idSemana}, function (data) {
			alert('Atividade adicionada');
			$(e.target).attr('hidden', true);
			var aux = $(`.vagas[id=${idAtividade}]`);
			aux.text(aux.text() -1);
			$(`.rm-atividade[id=${idAtividade}]`).attr('hidden', false); 
			console.log(data);
		  });
		});

		// Remover aticidades
		$('.lista-atividades').on('click', '.rm-atividade', function (e) {
		  const idAtividade = $(e.target).attr('id');
		  const idSemana = <?php echo $ativa["id"] ?>;
		  console.log("Remove atividade", idAtividade, idAtividade);
		  $.ajax({
			url: 'src/view/atividades.php',
			type: 'DELETE',
			data: JSON.stringify({idAtividade, idSemana}),
			success: function (data) {
			  console.log(data);
			  alert('Atividada removida');
			  $(e.target).attr('hidden', true);
				var aux = $(`.vagas[id=${idAtividade}]`);
				aux.text(parseInt(aux.text()) +1);
			  $(`.add-atividade[id=${idAtividade}]`).attr('hidden', false); 
			},
		  });
		  });
		
		function setMatriculas(semana, idAtividade) {
			$.get("src/view/matriculas.php", {semana: semana}, function (data) {
				data = JSON.parse(data)
				if (!data.error) {
				  data = data.map(a => (a.id_atividade));
				  
				  data.map(matri => {
					if (idAtividade.includes(matri)) {
					  $(`.rm-atividade[id=${matri}]`).attr('hidden', false); 
					  idAtividade.splice(idAtividade.indexOf(matri));
					}
				  });
				  
				  idAtividade.map(at => {
					$(`.add-atividade[id=${at}]`).attr('hidden', false)
				  });
				}
			});
		}
	});
	</script>

	<style>
	  .atividade {
		width: 300px;
		height: 200px;
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
	<h1>Atividades</h1>
	<?php if ($ativa): ?>
	<div class="lista-atividades" id="<?= $ativa["id"]?>" style="display: flex; flex-direction: column;">

		<?php foreach($atividade as $at): ?>
		  <div class="card" style="width: 18rem;"> 
			<div class="card-body">
			  <h5 class="card-title"><?= $at["nome"] ?></h5>
				  <h6 class="card-subtitle mb-2 text-muted"><?= date('d/m/Y', strtotime($at["data"])) ?></h6>
			  <p>Carga horária: <?= $at["carga_horaria"] ?></p>
			  <p>Vagas disponiveis: <span class="vagas" id="<?= $at["id"] ?>"><?= $at["vagas_disponivel"] ?></span></p>
			  <?php if(isset($_SESSION["usuario"])): ?>
				<?php $verficia = in_array($at["id"], $mat) ?>
				  <button class="add-atividade btn btn-success" <?= $verficia ? "hidden" : "" ?> id="<?= $at["id"] ?>">Adicionar</button>
				  <button class="rm-atividade btn btn-danger" " <?= $verficia ? "" : "hidden" ?> id="<?= $at["id"] ?>">Remover</button>
			  <?php endif ?>
			</div>
		  </div> 
		<?php endforeach; ?>
	</div>
	<?php else: ?>
		<h1>Não ha semana ativa</h1>
	<?php endif ?>

  </div>
</body>
</html>
