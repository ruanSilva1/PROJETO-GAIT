<?php
    include('../php/conexao.php');

    $query = $dbh->prepare('SELECT * FROM pagForma');
    $query->execute();
    $formaPagamento = $query->fetchAll();

    $query1 = $dbh->prepare('SELECT * FROM pTIPO');
    $query1->execute();
    $tipoPessoa = $query1->fetchAll();

    $query2 = $dbh->prepare('SELECT * FROM vendaSTATUS');
    $query2->execute();
    $statusVenda = $query2->fetchAll();

    $query3 = $dbh->prepare('SELECT * FROM orcamentoSTATUS');
    $query3->execute();
    $statusOrcamento = $query3->fetchAll();

    $cod_orcamento = $_GET['cod_orcamento'];
    $query_origin = $dbh->prepare('SELECT * FROM orcamento WHERE cod_orcamento = :cod_orcamento');

    $query_origin->execute(array(
        ':cod_orcamento' => $cod_orcamento
    ));
    $orcamento = $query_origin->fetch();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/cadastro_orcamentof.css">
    <link rel="shortcut icon" href="../favicon/favicon.ico" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Editar Orçamento</title>
</head>

<body>
    <form action="../php/update_orcamentof.php" method="post">
    <input type="hidden" name="cod_orcamento" value="<?php echo $_GET['cod_orcamento'];?>">
    <input type="submit" value="Editar">
        <div class="c1">
            <label for="nome_fantasia">Nome/ Fantasia</label>
            <input type="text" name="nome_fantasia" id="nome" value="<?php echo $orcamento['nome_fantasia'] ?>">
        </div>
        <div class="cl2">
            <label for="data_nascimento">Data nascimento</label>
            <input type="date" name="data_nascimento" id="data_nascimento" value="<?php echo $orcamento['data_nascimento']; ?>">
        </div>
        <div class="cl3">
            <label for="cpf">CPF</label>
            <input type="number" name="cpf" id="cpf" value="<?php echo $orcamento['cpf']; ?>">
        </div>
        <div class="cl4">
            <label for="cnpj">CNPJ</label>
            <input type="number" name="cnpj" id="cnpj" value="<?php echo $orcamento['cnpj']; ?>">
        </div>
        <div class="cl5">
            <label for="telefone">Telefone</label>
            <input type="tel" name="telefone" id="telefone" value="<?php echo $orcamento['telefone']; ?>">
        </div>
        <div class="cl6">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="<?php echo $orcamento['email']; ?>">
        </div>
        <div class="cl7">
            <label for="cep">CEP</label>
            <input type="number" name="cep" id="cep" value="<?php echo $orcamento['cep']; ?>">
        </div>
        <div class="cl8">
            <label for="endereco">Endereço</label>
            <input type="text" name="endereco" id="endereco" value="<?php echo $orcamento['endereco']; ?>">
        </div>
        <div class="cl9">
            <label for="n_endereco">Nº endereço</label>
            <input type="text" name="n_endereco" id="n_endereco" value="<?php echo $orcamento['n_endereco']; ?>">
        </div>
        <div class="cl10">
            <label for="forma_pagamento">Forma pagamento</label>
            <select name="forma_pagamento" id="forma_pagamento">
                <?php
                    foreach($formaPagamento as $forma){
                        $pagamento = '';
                        if($forma['cod'] == $orcamento['forma_pagamento'])
                        {
                            $pagamento = 'selected';
                        }
                        echo '<option value="'.$forma['cod'].'" '.$pagamento.'>'.$forma['forma'].'</option>';
                    }
                ?>
            </select>
        </div>
        <div class="cl11">
            <label for="tipo_pessoa">Tipo pessoa</label>
            <select name="tipo_pessoa" id="tipo_pessoa">
                <?php
                    foreach($tipoPessoa as $tipo){
                        $pessoa = '';
                        if($tipoPessoa['cod'] == $orcamento['tipo_pessoa'])
                        {
                            $pessoa = 'selected';
                        }
                        echo '<option value="'.$tipo['cod'].'" '.$pessoa.'>'.$tipo['tipo'].'</option>';
                    }
                ?>
            </select>
        </div>
        <div class="cl12">
            <label for="valor">Valor</label>
            <input type="text" name="valor" id="valor" value="<?php echo $orcamento['valor']; ?>">
        </div>
        <div class="cl13">
            <label for="status_venda">Status venda</label>
            <select name="status_venda" id="status_venda">
                <?php
                    foreach($statusVenda as $statusVenda){
                        $venda = '';
                        if($statusVenda['cod'] == $orcamento['status_venda'])
                        {
                            $venda = 'selected';
                        }
                        echo '<option value="'.$statusVenda['cod'].'" '.$venda.'>'.$statusVenda['sts'].'</option>';
                    }
                ?>
            </select>
            <label for="status_orcamento">Status orçamento</label>
            <select name="status_orcamento" id="status_orcamento">
                <?php
                    foreach($statusOrcamento as $statusOrcamento){
                        $status_o = '';
                        if($statusOrcamento['cod'] == $orcamento['status_orcamento'])
                        {
                            $status_o = 'selected';
                        }
                        echo '<option value="'.$statusOrcamento['cod'].'" '.$status_o.'>'.$statusOrcamento['sts'].'</option>';
                    }
                ?>
            </select>
        </div>
        <div class="div-cl14">
            <label for="pedido">Pedido</label>
            <input name="pedido" id="pedido" value="<?php echo $orcamento['pedido']; ?>"></input>
        </div>
        <div class="div-cl15">
            <label for="descricao">Descrição</label>
            <input name="descricao" id="descricao" value="<?php echo $orcamento['descricao']; ?>"></input>
        </div>
    </form>

    <div class="main">
    <div class="navbar">
            <div class="logo">
                <button>
                    <a href="index.html"><img class="imagem-logo" src="../imagem/SOFTWARE-GAIT-LOGO.png"
                            alt=""></a>
                        </button>
            </div>
            <nav>
                <a class="link" href="iniciof.html">Inicio</a>
                <a class="link" href="vendasf.php">Vendas</a>
                <a class="link" href="orcamentof.php">Orçamento</a>
                <a class="link" href="estoquef.php">Estoque</a>
                <a class="link" href="clientef.php">Clientes</a>
            </nav>
            <div class="local">
                <img src="../imagem/icone-orcamentos-removebg-preview.png" alt="">
                <h3>Orçamentos</h3>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>