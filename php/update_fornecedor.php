<?php
include('conexao.php');

    //$nome_fantasia = $_POST['nome_fantasia'];
    //$razao_social = $_POST['razao_social'];
    //$cnpj = $_POST['cnpj'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $cep = $_POST['cep'];
    $endereco = $_POST['endereco'];
    $cidade = $_POST['cidade'];
    $uf = $_POST['uf'];
    $n_endereco = $_POST['n_endereco'];
    $bairro = $_POST['bairro'];
    $status_fornecedor = $_POST['status_fornecedor'];
    $cod_fornecedor = $_POST['cod_fornecedor'];

    try{

        $query = $dbh->prepare('UPDATE fornecedor SET 
        telefone=:telefone, email=:email, cep=:cep, endereco=:endereco, cidade=:cidade, uf=:uf, n_endereco=:n_endereco, 
        bairro=:bairro, status_fornecedor=:status_fornecedor WHERE cod_fornecedor=:cod_fornecedor');

        $query->execute(array(
            //':nome_fantasia' => $nome_fantasia,
            //':razao_social' => $razao_social,
            //':cnpj' => $cnpj,
            ':telefone' => $telefone,
            ':email' => $email,
            ':cep' => $cep,
            ':endereco' =>$endereco,
            ':cidade' =>$cidade,
            ':uf' => $uf,
            ':n_endereco' => $n_endereco,
            ':bairro' => $bairro,
            ':status_fornecedor' => $status_fornecedor,
            ':cod_fornecedor' => $cod_fornecedor
        ));

        header('Location: ../html/fornecedores.php?atualizado');

    }catch(PDOException $e){
        header('Location: ../html/editar_cadastro_fornecedores.php');
    }
?>