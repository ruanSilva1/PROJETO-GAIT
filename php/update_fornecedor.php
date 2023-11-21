<?php
include('./conexao/conexao.php');
    if(isset($_POST['cod_fornecedor'], $_POST['nome_fantasia'], $_POST['razao_social'], $_POST['cnpj'], $_POST['telefone'], $_POST['email'], $_POST['cep'], $_POST['endereco'], $_POST['cidade'], $_POST['n_endereco'], $_POST['uf'], $_POST['bairro']) && ($_POST['nome_fantasia']!= '') && ($_POST['razao_social']!= '') && ($_POST['cnpj']!= '') && ($_POST['telefone']!= '') && ($_POST['email']!= '') && ($_POST['cep']!= '') && ($_POST['endereco']!= '') && ($_POST['cidade']!= '') && ($_POST['n_endereco']!= '') && ($_POST['uf']!= '') && ($_POST['bairro']!= '')){

        $cod_fornecedor = $_POST['cod_fornecedor'];
        $nome_fantasia = $_POST['nome_fantasia'];
        $razao_social = $_POST['razao_social'];
        $cnpj = $_POST['cnpj'];
        $telefone = $_POST['telefone'];
        $email = $_POST['email'];
        $cep = $_POST['cep'];
        $endereco = $_POST['endereco'];
        $cidade = $_POST['cidade'];
        $uf = $_POST['uf'];
        $n_endereco = $_POST['n_endereco'];
        $bairro = $_POST['bairro'];

    }else{
        echo "<script>alert('Variaveis não definidas')</script>";
        die();
    }

    try{
        $query = $dbh->prepare('UPDATE fornecedor SET nome_fantasia=:nome_fantasia, razao_social=:razao_social, cnpj=:cnpj,
        telefone=:telefone, email=:email, cep=:cep, endereco=:endereco, cidade=:cidade, uf=:uf, n_endereco=:n_endereco, 
        bairro=:bairro WHERE cod_fornecedor=:cod_fornecedor');

        $query->execute(array(
            ':nome_fantasia' => $nome_fantasia,
            ':razao_social' => $razao_social,
            ':cnpj' => $cnpj,
            ':telefone' => $telefone,
            ':email' => $email,
            ':cep' => $cep,
            ':endereco' =>$endereco,
            ':cidade' =>$cidade,
            ':uf' => $uf,
            ':n_endereco' => $n_endereco,
            ':bairro' => $bairro
            ':cod_fornecedor' => $cod_fornecedor
        ));

        echo "<script>alert('Seu cadastro foi atualizado com sucesso!')</script>";
    }catch(PDOException $e){
        echo "<script>alert('Cadastro não atualizado')</script>";
    }
?>