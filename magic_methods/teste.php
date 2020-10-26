<?php

use clientes\cliente;

require './model/cliente.php';

$b = new cliente();

$b->nome = "Oi";
$b->idade = 10;

echo $b->nome;
echo $b->idade;

echo '<br>';
echo $b;
?>
