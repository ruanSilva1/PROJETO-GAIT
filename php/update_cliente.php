<?php
    include('conexao.php');

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
        $status_cliente = $_POST['status_cliente'];
        $bairro = $_POST['bairro'];
        $tipo_pessoa = $_POST['tipo_pessoa'];
        $cod_cliente = $_POST['cod_cliente'];

    try{
        $query = $dbh->prepare('UPDATE cliente SET nome=:nome, data_nascimento=:data_nascimento, cpf=:cpf, cnpj=:cnpj, telefone=:telefone, email=:email, cep=:cep, rg=:rg, endereco=:endereco, cidade=:cidade, n_endereco=:n_endereco, status_cliente=:status_cliente, bairro=:bairro, tipo_pessoa=:tipo_pessoa WHERE cod_cliente=:cod_cliente');
        
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
            ':status_cliente' => $status_cliente,
            ':bairro' => $bairro,
            ':tipo_pessoa' => $tipo_pessoa,
            ':cod_cliente' => $cod_cliente
        ));

        echo "<script>alert('Cadastro Atualizado com sucesso!')</script>";
    }catch(PDOException $e){
        echo "<script>alert(".$e.")</script>";
    }
?>