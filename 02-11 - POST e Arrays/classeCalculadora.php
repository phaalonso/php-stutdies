<?php
	class CalculadoraBasica{
		private $a = 0;
		private $b = 0;

		public function setA($entrada){
			$this->a = $entrada;
		}

		public function setB($entrada){
			$this->b = $entrada;
		}

		public function somar(){
			return $this->a + $this->b;
		}
	}

	$calc = new CalculadoraBasica();
	$calc->setA(5);
	$calc->setB(10);

	echo $calc->somar();
?>