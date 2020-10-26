<?php
require_once "config.php";

use controller\ControllerProduto;
use model\Produto;

$p = new Produto;

$p->id = 2;
$p->nome = "Coca gelada";
$p->quantidade = 200;

$controller = new ControllerProduto; 
//$controller->create($p);
$controller->edit($p);
//$controller->delete($p);

//$res = $controller->findAll();
//echo json_encode($res);

//$res = $controller->findKey(100);
//echo json_encode($res);
