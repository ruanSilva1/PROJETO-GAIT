<?php
include('conexao.php');

    try{

        if(isset($_POST['nome_produto'], $_POST['descricao'], $_POST['quantidade'], $_POST['valor'], $_POST['imagem'], $_POST['status_produto'], $_POST['categoria'], $_POST['observacao']) &&
            ($_POST['nome_produto']!='') && ($_POST['descricao']!='') && ($_POST['quantidade']!='') && ($_POST['valor']!='') && ($_POST['categoria']!='')){

            $nome = $_POST['nome_produto'];
            $descricao = $_POST['descricao'];
            $quantidade = $_POST['quantidade'];
            $valor = $_POST['valor'];
            $imagem = $_POST['imagem'];
            $status_produto = $_POST['status_produto'];
            $categoria = $_POST['categoria'];
            $observacoes = $_POST['observacao'];

        }else{
            echo 'algo está errado';
        }

    }catch(PDOException $e){
        throw new MyDatabaseException($Exception->getMessage(), (int)$Exception->getCode());

        echo 'Erro isset';
    }

    try{
        $query = $dbh->prepare('INSERT INTO produto(nome, descricao, quantidade, valor, imagem, status_produto, categoria, observacoes)VALUES(
        :nome_produto, :descricao, :quantidade, :valor, :imagem, :status_produto, :categoria, :observacao)');

        $query->execute(array(
            ':nome_produto' => $nome,
            ':descricao' => $descricao,
            ':quantidade' => $quantidade,
            ':valor' => $valor,
            ':imagem' => $imagem,
            ':status_produto' => $status_produto,
            ':categoria' => $categoria,
            ':observacao' => $observacoes
        ));

        echo "<script>alert('Seu cadastro foi realizado com sucesso!')</script>";
        header('Location: ../html/cadastro_produto.php');

    }catch(PDOException $e){
        echo "<script>alert('Cadastro não realizado')</script>";
    }
?>