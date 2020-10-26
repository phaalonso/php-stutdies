<?php

/*
 * Pedro Henrique de Almeida Alonso
 * 3001059
 */

/*
 * Transforme uma imagem do tipo JPEG em uma thumbnail
 * com a proporção que receber por parametro
 */
function gerarThumbnail(String $imgName, int $scala_largura, int $scala_altura) {
	$image = imagecreatefromjpeg($imgName);

	$size = getimagesize($imgName);
	$largura = $size[0] / $scala_largura;
	$altura = $size[1] / $scala_altura;

	// Gera a imagem redimentsionada
	$imgRedimensionada = imagescale($image, $largura, $altura);
	// Imprime a imagem redimensionada
	imagejpeg($imgRedimensionada, "tbnail_".$imgName, 100);
}

gerarThumbnail("b.jpeg", 9, 16);
