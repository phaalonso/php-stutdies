<?php

namespace model;

/*
 * @property int $id
 * @property string $nome
 * @property int $qtd
 * @property float $precoTotal
 * @property ItemVenda[] $itens
 */
class Venda {
	private int $id;
	private float $precoTotal;
	private $itens;

	public function __get($name) {
		return $this->$name;
	}

	public function __set($name, $value) {
		if (!is_null($name)) {
			$this->$name = $value;

			if ($name == "itens") {
				echo $name . '<br/>';
				$this->calcPrecoTotal();
			}
		}
	}

	/*
	 * Percore o atributo ItemVenda[] $itens e calcula o preco total
	 */
	public function calcPrecoTotal() {
		$preco = 0;
		foreach($this->itens as $iv) {
			//echo json_encode($iv->toArray());
			//echo "<br/>";
			$preco += $iv->precoProduto * $iv->qtd; 	
		}
		$this->precoTotal = $preco;
	}

	public function toArray() {
		return array(
			"id" => $this->id,
			"precoTotal" => $this->precoTotal
		);
	}

}
