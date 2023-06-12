<?php
    require_once'../modelo/cliente.php';
    $objCliente = new Cliente();

    if(isset($_POST['insert'])){
        $nome = $_POST['txtnome'];
        $idade = $_POST['txtidade'];
        $cpf = $_POST['txtcpf'];
        if($objCliente->insert($nome, $idade, $cpf)){
            $objCliente->redirect('../cliente.php');
        }
    }

    if(isset($_POST['delete'])){
        $id = $_POST['txtid'];
        if($objCliente->deletar($id)){
            $objCliente->redirect('../cliente.php');
        }
    };

    if(isset($_POST['editar'])){
        $nome = $_POST['txtnome'];
        $idade = $_POST['txtidade'];
        $cpf = $_POST['txtcpf'];
        $id = $_POST['txtid'];
        if($objCliente->editar($nome, $idade, $cpf, $id)){
            $objCliente->redirect('../cliente.php');
        }
    }
?>