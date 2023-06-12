<?php
    require_once'../modelo/funcionario.php';
    $objFuncionario = new Funcionario();

    if(isset($_POST['insert'])){
        $nome = $_POST['txtnome'];
        $idade = $_POST['txtidade'];
        $cpf = $_POST['txtcpf'];
        if($objFuncionario->insert($nome, $idade, $cpf)){
            $objFuncionario->redirect('../funcionario.php');
        }
    }

    if(isset($_POST['delete'])){
        $id = $_POST['txtid'];
        if($objFuncionario->deletar($id)){
            $objFuncionario->redirect('../funcionario.php');
        }
    };

    if(isset($_POST['editar'])){
        $nome = $_POST['txtnome'];
        $idade = $_POST['txtidade'];
        $cpf = $_POST['txtcpf'];
        $id = $_POST['txtid'];
        if($objFuncionario->editar($nome, $idade, $cpf, $id)){
            $objFuncionario->redirect('../funcionario.php');
        }
    }
?>