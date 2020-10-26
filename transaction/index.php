<?php

use controller\ControllerProduto;
use controller\ControllerVenda;
use model\ItemVenda;
use model\Venda;
//use model\ItemVenda;

/*
 * Segue o exemplo com tratamento de errors, fiz o processo de tratamento
 * nos controllers, a forma mais facil de testar é causando um erro de chave primária
 * ao carregar a pagina duas vezes kk
 *
 * Para aproveitar mais do tratamento de erros eu habilitei o PDO para lançar exceptions no 
 * lugar de informar os erros via return ou algo parecido
 */

require_once "config.php";

// Controllers
$controleProduto = new ControllerProduto;
$controleVenda = new ControllerVenda;

// Produto 1 tem 100 de estoque, na venda 1 está sendo vendido 4
// Na venda 2 tentara ser vendido 200 estouranto a quantidade
$produto1 = $controleProduto->findKey(1);
$produto2 = $controleProduto->findKey(2);
$produto3 = $controleProduto->findKey(3);

// Venda 1

$venda = new Venda;
$venda->id = 1;


$iv1 = new ItemVenda;
$iv1->produto = $produto1;
$iv1->venda = $venda;
$iv1->qtd = 4;

$iv2 = new ItemVenda;
$iv2->produto = $produto2;
$iv2->venda = $venda;
$iv2->qtd = 10;

$iv3 = new ItemVenda;
$iv3->produto = $produto3;
$iv3->venda = $venda;
$iv3->qtd = 10;

$venda->itens = array($iv1, $iv2, $iv3);
$controleVenda->create($venda);

// Venda 2
$produto1 = $controleProduto->findKey(1);

$venda2 = new Venda;
$venda2->id = 2;

$iv1 = new ItemVenda;
$iv1->produto = $produto1;
$iv1->venda = $venda2;
$iv1->qtd = 200;

$venda2->itens = array($iv1);
$controleVenda->create($venda2);


