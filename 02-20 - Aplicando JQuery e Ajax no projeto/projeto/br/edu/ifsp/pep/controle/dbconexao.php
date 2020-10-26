<?php
    class Conexao{
        private $conexao;
		private $banco;
        private $dados;

        public function conectar(){
            $this->conexao = mysqli_connect("localhost", "root", "ifsp");
            $this->banco = mysqli_select_db($this->conexao, "dbaluno");
            mysqli_set_charset($this->conexao, "utf8");
            
        }

        public function execute($sql){
            $this->conectar();
            $this->dados = mysqli_query($this->conexao, $sql);
            return $this->dados;
        }

        public function executeSelect($sql){
            $this->conectar();
            $res = mysqli_query($this->conexao, $sql);
            if($res)
                $dados = mysqli_fetch_all($res, MYSQLI_ASSOC);
            else
                $dados = array();
            return $dados;
        }
    }
