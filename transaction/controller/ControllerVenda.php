<?php

namespace controller;

use controller\db\Conexao;
use Error;
use Exception;
use model\Venda;

class ControllerVenda extends Conexao {

	public function findAll() {
		return $this->select("SELECT * FROM Venda");
	}

	public function findKey(int $id) {
		if (is_int($id)) {
			$params = array(":id" => $id);
			return $this->select("SELECT * FROM Venda WHERE id=:id", $params);
		}
	}

	public function create(Venda $v) {
		$this->beginTransaction(); // Inicia a transação
		if ($this->inTransaction()) { // Verifica se a transação foi criada
			try {
				$valor = $v->toArray(); // Dados da venda

				$stmt = $this->prepare("INSERT INTO Venda(
					id, 
					precoTotal) VALUES (:id, :precoTotal)");
				$stmt->execute($valor);


				foreach($v->itens as $iten) {
					$params = $iten->toArray();

					$stmt = $this->prepare("INSERT INTO 
						ItemVenda(idProduto, idVenda, qtd, precoProduto) 
						VALUES (:idProduto, :idVenda, :qtd, :precoProduto)");

					$stmt->execute($params);

					$stmt = $this->prepare("UPDATE Produto SET qtd = qtd - :qtd WHERE id=:id");
					$stmt->execute(array(":qtd" => $iten->qtd, ":id" => $iten->produto->id));

					//Verifica a qtd de produtos	
					$stmt = $this->prepare("SELECT * FROM Produto WHERE id=:id");
					$stmt->execute(array("id" => $iten->produto->id));
					$p = $stmt->fetchObject("model\Produto");

					if($p->qtd < 0) {
						throw new Exception("Quantidade negativa");
					}
				}

				$this->commit();
				echo "Venda do id: " . $v->id . " concluida!"."<br/>";
			} catch (Exception $err) {
				echo 'Erro na venda de id: '. $v->id . "<br/>";
				echo 'Exceção capturada: ', $err->getMessage(), "\n";
				$this->rollBack();
			}
		} else {
			echo "Não foi possivel entrar em transaction";
		}
	}

	public function edit(Venda $v) {
		$valor = $v->toArray();

		$stmt = $this->query("UPDATE Venda SET 
			nome=:nome, 
			qtd=:qtd,
			precoTotal=:precoTotal
			WHERE id=:id", $valor);
	}

	public function delete(Venda $v) {
		if (!is_null($v->id)) {
			$stmt = $this->prepare("DELETE FROM Venda WHERE id=:id");
			$res = $stmt->execute(array("id" => $v->id));	
			echo $res;
		}
	}
}
