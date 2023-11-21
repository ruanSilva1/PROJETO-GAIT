<?php
    include('./phpghost/conexao.php');

    if(isset($_POST['cod_cliente']  $_POST['nome'], $_POST['data_nascimento'], $_POST['cpf'], $_POST['cnpj'], $_POST['telefone'], $_POST['email']
    , $_POST['cep'], $_POST['rg'], $_POST['endereco'], $_POST['cidade'], $_POST['n_endereco'], $_POST['bairro']
    , $_POST['status_cliente'], $_POST['tipo_pessoa']) && $_POST['cod_cliente']!='' && $_POST['nome']!='' && $_POST['data_nascimento']!='' && $_POST['cpf']!='' && $_POST['cnpj']!='' && $_POST['telefone']!='' && $_POST['email']!='' && $_POST['cep']!='' && $_POST['rg']!='' && $_POST['endereco']!='' && $_POST['cidade']!='' && $_POST['n_endereco']!='' && $_POST['bairro']!='' && $_POST['status_cliente']!='' &&  $_POST['tipo_pessoa']!=''){
        
        $cod_cliente = $_POST['cod_cliente'];
        $nome = $_POST['nome'];
        $data_nascimento = $_POST['data_nascimento'];
        $cpf = $_POST['cpf'];
        $cnpj = $_POST['cnpj'];
        $telefone = $_POST['telefone'];
        $email = $_POST['email'];
        $cep = $_POST['cep'];
        $rg = $_POST['rg'];
        $endereco = $_POST['endereco'];
        $cidade = $_POST['cidade'];
        $n_endereco = $_POST['n_endereco'];
        $bairro = $_POST['bairro'];
        $status_cliente = $_POST['status_cliente'];
        $tipo_pessoa = $_POST['tipo_pessoa'];
    }else{
        echo "<script>alert('Variaveis não definidas')</script>";
        die();
    }

    try{
        $query = $dbh->prepare('UPDATE cliente SET nome_fantasia=:nome, data_nascimento=:data_nascimento, cpf=:cpf, cnpj=:cnpj, telefone=:telefone, email=:email, cep=:cep, rg=:rg, endereco=:endereco, cidade=:cidade, n_endereco=:n_endereco,  bairro=:bairro, status_cliente=:status_cliente, tipo_pessoa=:tipo_pessoa WHERE cod_cliente=:cod_cliente');
        
        $query->execute(array(
            ':nome' => $nome,
            ':data_nascimento' => $data_nascimento,
            ':cpf' => $cpf,
            ':cnpj' => $cnpj,
            ':telefone' => $telefone,
            ':email' => $email,
            ':cep' => $cep,
            ':rg' => $rg,
            ':endereco' => $endereco,
            ':cidade' => $cidade,
            ':n_endereco' => $n_endereco,
            ':bairro' => $bairro,
            ':status_cliente' => $status_cliente,
            ':tipo_pessoa' => $tipo_pessoa,
            ':cod_cliente' => $cod_cliente
        ));

        echo "<script>alert('Seu cadastro foi atualizado com sucesso!')</script>";
    }catch(PDOException $e){
        echo "<script>alert('Cadastro não atualizado')</script>";
    }
?>