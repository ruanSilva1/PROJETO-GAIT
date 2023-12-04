<?php
    include('conexao.php');

        $nome = $_POST['nome'];
        $descricao = $_POST['descricao'];
        $quantidade = $_POST['quantidade'];
        $valor = $_POST['valor'];
        $status = $_POST['status'];
        //$categoria = $_POST['categoria'];
        $observacao = $_POST['observacao'];
        $cod_materia = $_POST['cod_materia'];

    try{

        $query = $dbh->prepare('UPDATE materia_prima SET nome=:nome, descricao=:descricao, quantidade=:quantidade, valor=:valor, status=:status, observacao=:observacao WHERE cod_materia=:cod_materia;');

        $query->execute(array(

            ':nome' => $nome,
            ':descricao' => $descricao,
            ':quantidade' => $quantidade,
            ':valor' => $valor,
            ':status' => $status,
            //':categoria' => $categoria,
            ':observacao' => $observacao,
            ':cod_materia' => $cod_materia

        ));
        
        header('Location: ../html/materiaprima.php?editado');

    }catch(PDOException $e){
        header('Location: ../html/editar_cadastro_materia_prima.php');
    }

?>