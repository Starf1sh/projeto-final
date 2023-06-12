<?php
    require_once('conexao.php');

    class Produto{
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

        public function insert($quantidade, $valor){
            try{
                $sql = "INSERT INTO produto(quantidade, valor)
                VALUES(:quantidade, :valor)";                

                $stmt = $this->conn->prepare($sql);
                $stmt->bindParam(':quantidade', $quantidade);
                $stmt->bindParam(':valor', $valor);

                $stmt->execute();
                
                return $stmt;

            }catch(PDOException $e){
                echo $e->getMessage();
            }
        }

        public function deletar($id){
            try{

                $sql = "DELETE FROM produto where id = :id";
                $stmt = $this->conn->prepare($sql);
                $stmt->bindParam(':id', $id);
                $stmt->execute();
                return $stmt;
            }catch(PDOException $e){
                echo $e->getMessage();
            }
        }

        public function editar($quantidade, $valor, $id){
            try{
                $sql = "UPDATE produto SET
                        quantidade = :quantidade,
                        valor = :valor
                        WHERE id = :id";

                $stmt = $this->conn->prepare($sql);
                $stmt->bindParam(':quantidade', $quantidade);
                $stmt->bindParam(':valor', $valor);
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