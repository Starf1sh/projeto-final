<?php
    require_once'../modelo/produto.php';
    $objProduto = new Produto();

    if(isset($_POST['insert'])){
        $quantidade = $_POST['txtquantidade'];
        $valor = $_POST['txtvalor'];
        if($objProduto->insert($quantidade, $valor)){
            $objProduto->redirect('../produto.php');
        }
    }

    if(isset($_POST['delete'])){
        $id = $_POST['txtid'];
        if($objProduto->deletar($id)){
            $objProduto->redirect('../produto.php');
        }
    };

    if(isset($_POST['editar'])){
        $nome = $_POST['txtnome'];
        $quantidade = $_POST['txtquantidade'];
        $valor = $_POST['txtvalor'];
        $id = $_POST['txtid'];
        if($objProduto->editar($nome, $quantidade, $valor, $id)){
            $objProduto->redirect('../produto.php');
        }
    }
?>