<?php
include('conexao.php');

    if(isset($_POST['nome_fantasia'], $_POST['data_nascimento'], $_POST['cpf'], $_POST['telefone'], $_POST['email'], $_POST['cep'], $_POST['endereco'], $_POST['n_endereco'],$_POST['forma_pagamento'], $_POST['tipo_pessoa'], $_POST['valor'],$_POST['status_venda'], $_POST['status_orcamento'], $_POST['descricao'], $_POST['pedido']) && ($_POST['nome_fantasia']!= '') && ($_POST['cpf']!= '') && ($_POST['forma_pagamento']!= '') && ($_POST['valor']!= '') && ($_POST['descricao']!= '') && ($_POST['pedido'])){

        $nome_fantasia = $_POST['nome_fantasia'];
        $data_nascimento = $_POST['data_nascimento'];
        $cpf = $_POST['cpf'];
        $cnpj = $_POST['cnpj'];
        $telefone = $_POST['telefone'];
        $email = $_POST['email'];
        $cep = $_POST['cep'];
        $endereco = $_POST['endereco'];
        $n_endereco = $_POST['n_endereco'];
        $formaPagamento = $_POST['forma_pagamento'];
        $tipoPessoa = $_POST['tipo_pessoa'];
        $valor = $_POST['valor'];
        $statusVenda = $_POST['status_venda'];
        $statusOrcamento = $_POST['status_orcamento'];
        $descricao = $_POST['descricao'];
        $pedido = $_POST['pedido'];

    }else{
        echo "<script>alert('Campos obrigatórios não preenchidos!')</script>";
        die();
    }

    try{
        $query = $dbh->prepare('INSERT INTO orcamento(nome_fantasia, data_nascimento, cpf, cnpj, telefone, email, cep, endereco, n_endereco,forma_pagamento, tipo_pessoa, valor, status_venda, status_orcamento, descricao, pedido)VALUES(:nome_fantasia, :data_nascimento, :cpf, :cnpj, :telefone, :email, :cep, :endereco, :n_endereco, :forma_pagamento, :tipo_pessoa, :valor,:status_venda, :status_orcamento, :descricao, :pedido)');

        $query->execute(array(
            ':nome_fantasia' => $nome_fantasia,
            ':data_nascimento' => $data_nascimento,
            ':cpf' => $cpf,
            ':cnpj' => $cnpj,
            ':telefone' => $telefone,
            ':email' => $email,
            ':cep' => $cep,
            ':endereco' => $endereco,
            ':n_endereco' => $n_endereco,
            ':forma_pagamento' => $formaPagamento,
            ':tipo_pessoa' => $tipoPessoa,
            ':valor' => $valor,
            ':status_venda' => $statusVenda,
            ':status_orcamento' => $statusOrcamento,
            ':descricao' => $descricao,
            ':pedido' => $pedido
        ));

        echo "<script>alert('Seu cadastro foi realizado com sucesso!')</script>";
        header('Location: ../html/orcamentof.php');

    }catch(PDOException $e){
        echo "<script>alert('Cadastro não realizado')</script>";
    }
?>