<?php
    require_once('conexao.php');

    class Funcionario{
        private $conn;

        public function __construct(){
            $dataBase = new dataBase();
            //$db = $dataBase->dbConnection();
            //$this->conn = $db;
            $this->conn = $dataBase->dbConnection();
        }

        public function runQuery($sql){
            $stmt = $this->conn->prepare($sql);
            return $stmt;
        }

        public function insert($nome, $idade, $cpf){
            try{
                $sql = "INSERT INTO funcionario(nome, idade, cpf)
                VALUES(:nome, :idade, :cpf)";                

                $stmt = $this->conn->prepare($sql);
                $stmt->bindParam(':nome', $nome);
                $stmt->bindParam(':idade', $idade);
                $stmt->bindParam(':cpf', $cpf);

                $stmt->execute();
                
                return $stmt;

            }catch(PDOException $e){
                echo $e->getMessage();
            }
        }

        public function deletar($id){
            try{

                $sql = "DELETE FROM funcionario where id = :id";
                $stmt = $this->conn->prepare($sql);
                $stmt->bindParam(':id', $id);
                $stmt->execute();
                return $stmt;
            }catch(PDOException $e){
                echo $e->getMessage();
            }
        }

        public function editar($nome, $idade, $cpf, $id){
            try{
                $sql = "UPDATE funcionario SET
                        nome = :nome,
                        idade = :idade,
                        cpf = :cpf
                        WHERE id = :id";

                $stmt = $this->conn->prepare($sql);
                $stmt->bindParam(':nome', $nome);
                $stmt->bindParam(':idade', $idade);
                $stmt->bindParam(':cpf', $cpf);
                $stmt->bindParam(':id', $id);
                $stmt->execute();
                return $stmt;

            }catch(PDOException $e){
                echo $e->getMessage();
            }
        }

        public function redirect($url){
            header("Location: $url");
        }        
    }
?>