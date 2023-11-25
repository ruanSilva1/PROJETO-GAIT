<?php
    include('conexao.php');

    if(isset($_POST['cod_materia'], $_POST['nome'], $_POST['descricao'], $_POST['quantidade'], $_POST['valor'], $_POST['status'], $_POST['categoria'], $_POST['observacao']) && ($_POST['nome']!='') && ($_POST['descricao']!='') && ($_POST['quantidade']!='') && ($_POST['valor']!='') && ($_POST['status']!='') && ($_POST['categoria']!='') && ($_POST['observacao']!='')){

        $cod_materia = $_POST['cod_materia'];
        $nome = $_POST['nome'];
        $descricao = $_POST['descricao'];
        $quantidade = $_POST['quantidade'];
        $valor = $_POST['valor'];
        $status = $_POST['status'];
        $categoria = $_POST['categoria'];
        $observacao = $_POST['observacao'];

    }else{
        echo 'Variaveis não definidas';
    }

    try{

        $query = $dbh->prepare('UPDATE materia_prima SET nome=:nome, descricao=:descricao, quantidade=:quantidade, valor=:valor, status=:status, categoria=:categoria, observacao=:observacao WHERE cod_materia=:cod_materia;');

        $query->execute(array(

            ':nome' => $nome,
            ':descricao' => $descricao,
            ':quantidade' => $quantidade,
            ':valor' => $valor,
            ':status' => $status,
            ':categoria' => $categoria,
            ':observacao' => $observacao,
            ':cod_materia' => $cod_materia

        ));

        header('Location: ../html/materiaprima.php');

    }catch(PDOException $e){

        throw new MyDatabaseException($Exception -> getMessage(), (int)$Exception -> getCode());
    }

?>