<?php
    include ('conexao.php');
    
    $nome = $_POST['nome_produto'];
    $valor = $_POST['valor'];
    $quantidade = $_POST['quantidade'];
    $categoria = $_POST['categoria'];
    $status_produto = $_POST['status_produto'];
    $descricao = $_POST['descricao'];
    $observacao = $_POST['observacao'];
    $cod_produto = $_POST['cod_produto'];

    try{
        $query = $dbh->prepare('UPDATE produto SET nome=:nome_produto, descricao = :descricao, quantidade = :quantidade, valor = :valor, status_produto = :status_produto, categoria = :categoria, observacoes = :observacoes WHERE cod_produto = :cod_produto;');

        $query->execute(array(
            ':nome_produto' => $nome,
            ':descricao' => $descricao,
            ':quantidade' => $quantidade,
            ':valor' => $valor,
            ':status_produto' => $status_produto,
            ':categoria' => $categoria,
            ':observacoes' => $observacao,
            ':cod_produto' => $cod_produto
        ));

        header('Location: ../html/estoquef.php');
    }catch(PDOException $e){
        echo $e;
    }
?>