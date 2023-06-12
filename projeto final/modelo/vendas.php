<?php
    require_once('conexao.php');

    class Vendas{
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

        public function insert($id_cliente, $id_funcionario, $id_produto, $quantidade, $valor){
            try{
                $sql = "INSERT INTO vendas(id_cliente, id_funcionario, id_produto, quantidade, valor)
                VALUES(:id_cliente, :id_funcionario, :id_produto, :quantidade, :valor)";                

                $stmt = $this->conn->prepare($sql);
                $stmt->bindParam(':id_cliente', $id_cliente);
                $stmt->bindParam(':id_funcionario', $id_funcionario);
                $stmt->bindParam(':id_produto', $id_produto);
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

                $sql = "DELETE FROM vendas where id = :id";
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
                $sql = "UPDATE vendas SET
                        id_cliente = :id_cliente
                        id_funcionario = :id_funcionario
                        id_produto = :id_produto
                        quantidade = :quantidade
                        valor = :valor

                        WHERE id = :id";

                $stmt = $this->conn->prepare($sql);
                $stmt->bindParam(':id_cliente', $id_cliente);
                $stmt->bindParam(':id_funcionario', $id_funcionario);
                $stmt->bindParam(':id_produto', $id_produto);
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