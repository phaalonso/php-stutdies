<?php
    class Aluno{
        private $prontuario = "";
        private $nome = "";
        private $disciplina = "";
        private $idade = 0;
        private $termo = 0;

        public function getProntuario(){
            return $this->prontuario;
        }

        public function setProntuario($prontuario){
            $this->prontuario = $prontuario;
        }

        public function getNome(){
            return $this->nome;
        }

        public function setNome($nome){
            $this->nome = $nome;
        }

        public function getDisciplina(){
            return $this->disciplina;
        }

        public function setDisciplina($disciplina){
            $this->disciplina = $disciplina;
        }

        public function getIdade(){
            return $this->idade;
        }

        public function setIdade($idade){
            $this->idade = $idade;
        }

        public function getTermo(){
            return $this->termo;
        }

        public function setTermo($termo){
            $this->termo = $termo;
        }

    }

?>