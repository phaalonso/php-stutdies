<?php

if (session_status() == PHP_SESSION_NONE) {
	session_start();
}

$flag = strchr($_SERVER["REQUEST_URI"], "admin");
$rootPath = $flag ? "../" : "";
$admPath = $flag ? "" : "admin/";

$ultimaOcorrencia = strrpos($_SERVER["REQUEST_URI"], "/");
$s = substr($_SERVER["REQUEST_URI"], $ultimaOcorrencia);

?>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary" style="border-bottom-left-radius: 8px; border-bottom-right-radius: 8px;">
<div class="container-fluid">
  <a class="navbar-brand" href="#">Semana de Tecnologia</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
	<span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
	<ul class="navbar-nav">
	  <li class="nav-item"> 
		  <a class="nav-link <?php echo(!$flag && $s === "/index.php" ? "active" : "") ?>" href="<?php echo($rootPath) ?>index.php" >
			Principal
	      </a>
	  </li>
	  <li class="nav-item">
		  <a class="nav-link <?php echo(!$flag && $s === "/semana.php" ? "active" : "") ?>" href="<?php echo($rootPath) ?>semana.php" >Semanas</a>
	  </li>
	  <li class="nav-item">
		  <a class="nav-link <?php echo(!$flag && $s === "/atividades.php" ? "active" : "") ?>" href="<?php echo($rootPath) ?>atividades.php">Atividades</a>
	  </li>
	  <li class="nav-item dropdown">
	  <a class="nav-link dropdown-toggle <?php echo($flag ? "active" : "") ?> " href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		  Admin
		</a>
		<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
		  <a class="dropdown-item <?php echo(($flag && $s === "/alunos.php") ? "active" : "") ?>" href="<?php echo($admPath) ?>alunos.php">Alunos</a>
		  <a class="dropdown-item <?php echo(($flag && $s === "/atividades.php") ? "active" : "") ?>" href="<?php echo($admPath) ?>atividades.php">Atividades</a>
		  <a class="dropdown-item <?php echo(($flag && $s === "/semana.php") ? "active" : "") ?>" href="<?php echo($admPath) ?>semana.php">Semana</a>
		</div>
	  </li>
	  <li class="nav-item">
		<?php if (!isset($_SESSION["usuario"])) : ?>
		  <a class="nav-link <?php echo($s === "/logar.php" ? "active" : "") ?>" href="<?php echo($rootPath) ?>logar.php">Logar</a>
		<?php else: ?>
		  <a class="nav-link" href="<?php echo($rootPath)?>src/view/deslogar.php">Deslogar</a>
		<?php endif ?>
	  </li>
	</ul>
  </div>
</div>
</nav>	
