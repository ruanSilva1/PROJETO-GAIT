<?php
include('conexao.php');

    if(isset($_POST['nome'], $_POST['descricao'], $_POST['quantidade'], $_POST['valor'], $_POST['imagem'], $_POST['status_produto'], $_POST['categoria'], $_POST['observacoes']) &&
    ($_POST['nome']!='') && ($_POST['descricao']!='') && ($_POST['quantidade']!='') && ($_POST['valor']!='') && ($_POST['imagem']!='') && ($_POST['status_produto']!='') && 
    ($_POST['categoria']) && ($_POST['observacoes']!='')){

        $nome = $_POST['nome'];
        $descricao = $_POST['descricao'];
        $quantidade = $_POST['quantidade'];
        $valor = $_POST['valor'];
        $imagem = $_POST['imagem'];
        $status_produto = $_POST['status_produto'];
        $categoria = $_POST['categoria'];
        $observacoes = $_POST['observacoes'];

    }else{
        echo "<script>alert('Variaveis não definidas')</script>";
        die();
    }

    try{
        $query = $dbh->prepare('INSERT INTO produto(nome, descricao, quantidade, valor, imagem, status_produto, categoria, observacoes)VALUES(
        :nome, :descricao, :quantidade, :valor, :imagem, :status_produto, :categoria, :observacoes)');

        $query->execute(array(
            ':nome' => $nome,
            ':descricao' => $descricao,
            ':quantidade' => $quantidade,
            ':valor' => $valor,
            ':imagem' => $imagem,
            ':status_produto' => $status_produto,
            ':categoria' => $categoria,
            ':observacoes' => $observacoes
        ));

        /*$resultado = $query->fetch();

        if(empty($resultado)){
            header('location: cadastro_orcamento.php');
            echo "<script>alert('Seu cadastro não foi salvo!')</script>";
        }
        */
        echo "<script>alert('Seu cadastro foi realizado com sucesso!')</script>";

    }catch(PDOException $e){
        echo "<script>alert('Cadastro não realizado')</script>";
}
?>