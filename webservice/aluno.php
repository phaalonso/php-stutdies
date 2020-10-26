<?php


require("config.php");
require("webinit.php");
use database\Conexao;

$post_data = file_get_contents('php://input');
$data = json_decode($post_data, true);
if ($_SERVER["REQUEST_METHOD"] === "POST") {
	try {
	  $conexao = new Conexao;
	  $res = $conexao->query("INSERT INTO aluno (ra, nome, endereco, cidade, uf, cep) VALUES (:ra, :nome, :endereco, :cidade, :uf, :cep)", [
		'ra' => $data["ra"],
		"nome" => $data["nome"],
		"endereco" => $data["endereco"],
		"cidade" => $data["cidade"],
		"uf" => $data["uf"],
		"cep" => $data["cep"]
	  ]);
	  
	  if ($res)
		message($res, "Cadastrado", null);
	} catch (Exception $e) {
		message(false, $e->getMessage(), 400);

	}
} else if ($_SERVER["REQUEST_METHOD"] === "GET"){
  if(isset($data["ra"])) {
	  $conexao = new Conexao;
	  $res = $conexao->findOne("SELECT * FROM aluno WHERE ra=:ra", ["ra" => $data["ra"]]);
	  message(true, null, $res);
  }	else {
	  $conexao = new Conexao;
	  $res = $conexao->findAll("SELECT * FROM aluno");
	  message(true, null, $res);
  }
}
