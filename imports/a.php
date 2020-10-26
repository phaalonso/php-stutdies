<?php

require_once("./config.php");

$pessoa = new Pessoa;
$pessoa->nome = "Pedro";
$pessoa->email = "dawji";
echo($pessoa->__toString());
