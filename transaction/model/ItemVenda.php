<?php

namespace model;
use model\Venda;
use model\Produto;

/*
 * @property Produto $produto
 * @property Venda $venda
 * @property int $qtd
 * @property float $precoProduto
 */
class ItemVenda {
	private Produto $produto;
	private Venda $venda;
	private int $qtd;
	private float $precoProduto;

	public function __get($name) {
		return $this->$name;
	}

	public function __set($name, $value) {
		if (!is_null($name)) {
			$this->$name = $value;

			if ($name = "Produto") {
				$this->precoProduto = $this->produto->preco;
			}
		}
	}

	public function toArray() {
		return array(
			"idProduto" => $this->produto->id,
			"idVenda" => $this->venda->id,
			"qtd" => $this->qtd,
			"precoProduto" => $this->precoProduto
		);
	}
}
