<?php
    require_once "../modelo/Aluno.php";
    require_once "./dbconexao.php";

    class DaoAluno {
        private $conexao;

        public function __construct(){
            $this->conexao = new Conexao();
        }

        public function salvar($aluno){
            $sql = "INSERT INTO aluno (prontuario, nome, disciplina, idade, termo) 
                VALUES (
                    '{$aluno->getProntuario()}',
                    '{$aluno->getNome()}',
                    '{$aluno->getDisciplina()}',
                    {$aluno->getIdade()},
                    {$aluno->getTermo()}
                )";
            $resultado = $this->conexao->execute($sql);
            echo $resultado;
        }

        public function atualizar($aluno){
            $sql = "UPDATE aluno SET 
                        nome='{$aluno->getNome()}',
                        disciplina='{$aluno->getDisciplina()}',
                        idade={$aluno->getIdade()},
                        termo={$aluno->getTermo()}
                    WHERE prontuario = '{$aluno->getProntuario()}'";
            $resultado = $this->conexao->execute($sql);
            echo $resultado;
        }

        public function excluir($aluno){
            $sql = "DELETE FROM aluno WHERE prontuario = '{$aluno->getProntuario()}'";
            $resultado = $this->conexao->execute($sql);
            echo $resultado;
        }

        public function consultar($prontuario){
            $sql = "SELECT * FROM aluno WHERE prontuario = '{$prontuario}'";
            $resultado = $this->conexao->executeSelect($sql);
            if($resultado == null){
                echo "Não encontrado";
            }else{
                echo json_encode($resultado);
            }
        }
    }

    $daoaluno = new DaoAluno();
    $aluno = new Aluno();
    switch($_POST["tipo"]){
        case 1:
            $daoaluno->consultar($_POST["prontuario"]);
            break;
    }

    #$aluno = new Aluno();
    #$aluno->setProntuario($_POST["prontuario"]);
    #$aluno->setNome($_POST["nome"]);
    #$aluno->setDisciplina($_POST["disciplina"]);
    #$aluno->setIdade(intval($_POST["idade"]));
    #$aluno->setTermo(intval($_POST["termo"]));

    #
    #$daoaluno->atualizar($aluno);
    #$daoaluno->salvar($aluno);
    #$daoaluno->excluir($aluno);
