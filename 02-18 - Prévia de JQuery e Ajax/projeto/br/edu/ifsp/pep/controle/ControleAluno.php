<?php
    require_once "../modelo/Aluno.php";
    require_once "dbconexao.php";

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
            if($resultado){
                echo "Inserção feita com sucesso";
            }else{
                echo "Ocorreu um erro na inserção";
            }
        }

        public function atualizar($aluno){
            $sql = "UPDATE aluno SET 
                        nome='{$aluno->getNome()}',
                        disciplina='{$aluno->getDisciplina()}',
                        idade={$aluno->getIdade()},
                        termo={$aluno->getTermo()}
                    WHERE prontuario = '{$aluno->getProntuario()}'";
            $resultado = $this->conexao->execute($sql);
            if($resultado){
                echo "Update realizado com sucesso";
            }else{
                echo "Ocorreu um erro no update";
            }
        }

        public function excluir($aluno){
            $sql = "DELETE FROM aluno WHERE prontuario = '{$aluno->getProntuario()}'";
            $resultado = $this->conexao->execute($sql);
            if($resultado){
                echo "Exclusão realizada com sucesso";
            }else{
                echo "Ocorreu um erro na exclusão";
            }
        }
    }

    $aluno = new Aluno();
    $aluno->setProntuario($_POST["prontuario"]);
    $aluno->setNome($_POST["nome"]);
    $aluno->setDisciplina($_POST["disciplina"]);
    $aluno->setIdade(intval($_POST["idade"]));
    $aluno->setTermo(intval($_POST["termo"]));

    $daoaluno = new DaoAluno();
    #$daoaluno->atualizar($aluno);
    #$daoaluno->salvar($aluno);
    $daoaluno->excluir($aluno);
?>