<?php
    require_once'../modelo/vendas.php';
    $objVendas = new Vendas();

    if(isset($_POST['insert'])){
        $id_cliente = $_POST['txtid_cliente'];
        $id_funcionario = $_POST['txtid_funcionario'];
        $id_produto = $_POST['txtid_produto'];
        $quantidade = $_POST['txtquantidade'];
        $valor = $_POST['txtvalor'];
        if($objVendas->insert($id_cliente, $id_funcionario, $id_produto, $quantidade, $valor)){
            $objVendas->redirect('../vendas.php');
        }
    }

    if(isset($_POST['delete'])){
        $id = $_POST['txtid'];
        if($objVendas->deletar($id)){
            $objVendas->redirect('../vendas.php');
        }
    };

    if(isset($_POST['editar'])){
        $quantidade = $_POST['txtquantidade'];
        $valor = $_POST['txtvalor'];
        $id = $_POST['txtid'];
        if($objVendas->editar($id_cliente, $id_funcionario, $id_produto, $quantidade, $valor
        ,)){
            $objVendas->redirect('../vendas.php');
        }
    }
?>