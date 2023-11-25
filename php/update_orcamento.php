<?php
include('conexao.php');

    if(isset($_POST['cod_orcamento'], $_POST['nome'], $_POST['data_nascimento'], $_POST['cpf'], $_POST['cnpj'], $_POST['telefone'], $_POST['email'], $_POST['cep'], $_POST['endereco'], $_POST['n_endereco'], $_POST['forma_pagamento'], $_POST['tipo_pessoa'], $_POST['valor'], $_POST['status_venda'], $_POST['status_orcamento'], $_POST['pedido'], $_POST['descricao']) && ($_POST['nome']!='') && ($_POST['cnpj']!='') && ($_POST['telefone']!='') && ($_POST['email']!='') && ($_POST['cep']!='') && ($_POST['endereco']!='') && ($_POST['n_endereco']!='') && ($_POST['forma_pagamento']!='') && ($_POST['tipo_pessoa']!='') && ($_POST['valor']!='') && ($_POST['status_venda']!='') && ($_POST['status_orcamento']!='') && ($_POST['pedido']!='') && ($_POST['descricao']!='')){
        $cod_orcamento = $_POST['cod_orcamento'];
        $nome = $_POST['nome'];
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
    }

    try{
        $query = $dbh->prepare('UPDATE orcamento SET nome=:nome, cnpj=:cnpj, telefone=:telefone, email=:email, cep=:cep, endereco=:endereco, n_endereco, forma_pagamento=:forma_pagamento, tipo_pessoa=:tipo_pessoa, valor=:valor, status_venda=:status_venda, status_orcamento=:status_orcamento, pedido=:pedido, descricao=:descricao WHERE cod_orcamento=:cod_orcamento');
        $query->execute(array(
            
            ':nome' => $nome,
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
        header('Location: ../html/orcamento.php');
    }catch(PDOException $e){
        //echo "<script>alert('Cadastro não atualizado')</script>";
        echo $e;
    }
?>

