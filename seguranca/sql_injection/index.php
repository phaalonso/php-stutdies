<?php


$id = (isset($_GET["id"])) ? $_GET["id"] : 1;

if (!is_numeric($id)) {
	echo "Error";
	exit;
}

$conn = mysqli_connect("localhost:3306", "ifsp", "ifsp", "crud_pdo");

if ($conn) {
	$sql = "SELECT * FROM ItemVenda WHERE idProduto = $id";
	$exec = mysqli_query($conn, $sql);

	if ($exec) {
		while ($res = mysqli_fetch_object($exec)) {
			var_dump($res);
			//echo $res-> . "<br/>";
		}
	}
} else {
	mysqli_connect_error();
}
