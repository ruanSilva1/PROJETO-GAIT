<?php

session_start();
include('conexao.php');

        if(isset($_POST['nome_produto'], $_POST['descricao'], $_POST['quantidade'], $_POST['valor'], $_POST['status_produto'], $_POST['categoria'], $_POST['observacao']) && ($_POST['nome_produto']!='') && ($_POST['descricao']!='') && ($_POST['quantidade']!='') && ($_POST['valor']!='')){

            $nome = $_POST['nome_produto'];
            $descricao = $_POST['descricao'];
            $quantidade = $_POST['quantidade'];
            $valor = $_POST['valor'];
            $status_produto = $_POST['status_produto'];
            $categoria = $_POST['categoria'];
            $observacoes = $_POST['observacao'];

        }else{
            echo "<script>alert('Campos obrigatórios não preenchidos!')</script>";
            die();
        }

    try{
        $query = $dbh->prepare('INSERT INTO produto(nome, descricao, quantidade, valor, status_produto, categoria, observacoes)VALUES(:nome_produto, :descricao, :quantidade, :valor,:status_produto, :categoria, :observacao)');

        $query->execute(array(

            ':nome_produto' => $nome,
            ':descricao' => $descricao,
            ':quantidade' => $quantidade,
            ':valor' => $valor,
            ':status_produto' => $status_produto,
            ':categoria' => $categoria,
            ':observacao' => $observacoes

        ));

        $_SESSION['inserir_sucesso'] = "Cadastrado com sucesso!";
        header('Location: ../html/estoque.php');

    }catch(PDOException $e){
        
        $_SESSION['inserir_erro'] = "Cadastro não realizado!";
        header('Location: ../html/estoque.php');
    }
?>