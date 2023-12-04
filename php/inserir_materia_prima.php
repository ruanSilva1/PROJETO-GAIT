<?php
    include('conexao.php');

    if(isset($_POST['nome'], $_POST['descricao'], $_POST['quantidade'], $_POST['valor'], $_POST['status'], $_POST['categoria'], $_POST['observacao']) &&($_POST['nome']!='') && ($_POST['descricao']!='') && ($_POST['quantidade']!='') && ($_POST['valor']!='') && ($_POST['status']!='') && ($_POST['categoria']!='')){

        $nome = $_POST['nome'];
        $descricao = $_POST['descricao'];
        $quantidade = $_POST['quantidade'];
        $valor = $_POST['valor'];
        $status = $_POST['status'];
        $categoria = $_POST['categoria'];
        $observacao = $_POST['observacao'];

    }else{
        header('Location: ../html/cadastro_materia_prima.php?comentario');
        die();
    }

    try{
        $query = $dbh->prepare('INSERT INTO materia_prima(nome, descricao, quantidade, valor, status, categoria, observacao)VALUES(
        :nome, :descricao, :quantidade, :valor, :status, :categoria, :observacao)');

        $query->execute(array(
            ':nome' => $nome,
            ':descricao' => $descricao,
            ':quantidade' => $quantidade,
            ':valor' => $valor,
            ':status' => $status,
            ':categoria' => $categoria,
            ':observacao' => $observacao
        ));

        header('Location: ../html/materiaprima.php');

    }catch(PDOException $e){
        header('Location: ../html/cadastro_materia_prima.php?comentario');
    }
?>