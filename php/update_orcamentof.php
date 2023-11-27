<?php
include('conexao.php');

    $nome = $_POST['nome_fantasia'];
    $cnpj = $_POST['cnpj'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $cep = $_POST['cep'];
    $endereco = $_POST['endereco'];
    $n_endereco = $_POST['n_endereco'];
    $forma_pagamento = $_POST['forma_pagamento'];
    $tipo_pessoa = $_POST['tipo_pessoa'];
    $valor = $_POST['valor'];
    $status_venda = $_POST['status_venda'];
    $status_orcamento = $_POST['status_orcamento'];
    $pedido = $_POST['pedido'];
    $descricao = $_POST['descricao'];
    $cod_orcamento = $_POST['cod_orcamento'];

    try{
        $query = $dbh->prepare('UPDATE orcamento SET nome_fantasia=:nome_fantasia, cnpj=:cnpj, telefone=:telefone, email=:email, cep=:cep, endereco=:endereco, n_endereco=:n_endereco, forma_pagamento=:forma_pagamento, tipo_pessoa=:tipo_pessoa, valor=:valor, status_venda=:status_venda, status_orcamento=:status_orcamento, pedido=:pedido, descricao=:descricao WHERE cod_orcamento=:cod_orcamento');
        $query->execute(array(
            
            ':nome_fantasia' => $nome,
            ':cnpj' => $cnpj,
            ':telefone' => $telefone,
            ':email' => $email,
            ':cep' => $cep,
            ':endereco' => $endereco,
            ':n_endereco' => $n_endereco,
            ':forma_pagamento' => $forma_pagamento,
            ':tipo_pessoa' => $tipo_pessoa,
            ':valor' => $valor,
            ':status_venda' => $status_venda,
            ':status_orcamento' => $status_orcamento,
            ':pedido' => $pedido,
            ':descricao' => $descricao,
            ':cod_orcamento' => $cod_orcamento
        ));
        
        echo "<script>alert('Seu cadastro foi atualizado com sucesso!')</script>";
        header('Location: ../html/orcamentof.php');
    }catch(PDOException $e){
        //echo "<script>alert('Cadastro não atualizado')</script>";
        echo $e;
    }
?>

