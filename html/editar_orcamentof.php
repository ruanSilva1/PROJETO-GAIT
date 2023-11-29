<?php
    include('../php/conexao.php');

    $query = $dbh->prepare('SELECT * FROM pagForma');
    $query->execute();
    $formaPagamento = $query->fetchAll();

    $query1 = $dbh->prepare('SELECT * FROM cliente');
    $query1->execute();
    $cliente = $query1->fetchAll();

    $query2 = $dbh->prepare('SELECT * FROM vendaSTATUS');
    $query2->execute();
    $statusVenda = $query2->fetchAll();

    $query3 = $dbh->prepare('SELECT * FROM orcamentoSTATUS');
    $query3->execute();
    $statusOrcamento = $query3->fetchAll();

    $tbl = $dbh->prepare('SELECT * FROM orcamento');
    $tbl->execute();
    $resultadoTBL = $tbl->fetchAll();
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
            <select name="id_cliente" id="nome_fantasia">
                <?php
                    foreach($cliente as $cliente){
                        echo '<option value="'.$cliente['cod_cliente'].'" '.$n.'>'.$cliente['nome'].'</option>';
                    }
                ?>
            </select>
        </div>
        <div class="c2">
            <label for="pedido">Pedido</label>
            <input name="pedido" id="pedido" ></input>
        </div>
        <div class="c3">
            <label for="valor">Valor</label>
            <input type="text" name="valor" id="valor">
        </div>
        <div class="c4">
            <label for="forma_pagamento">Forma pagamento</label>
            <select name="forma_pagamento" id="forma_pagamento">
                <?php
                    foreach($formaPagamento as $forma){
                        echo '<option value="'.$forma['cod'].'">'.$forma['forma'].'</option>';
                    }
                ?>
            </select>
        </div>
        <div class="c5">
            <label for="descricao">Descrição</label>
            <textarea name="descricao" id="descricao"></textarea>
        </div>
        <div class="c6">
            <label for="status_venda">Status venda</label>
            <select name="status_venda" id="status_venda">
                <?php
                    foreach($statusVenda as $statusVenda){
                        $sts = '';
                        if($statusVenda['cod'] == $orcamento['status_venda']){
                            $sts = 'selected';
                        }
                        echo '<option value="'.$statusVenda['cod'].'" '.$sts.'>'.$statusVenda['sts'].'</option>';
                    }
                ?>
            </select>
        </div>
        <div class="c7">
        <label for="status_orcamento">Status orçamento</label>
            <select name="status_orcamento" id="status_orcamento">
                <?php
                    foreach($statusOrcamento as $statusOrcamento){
                        echo '<option value="'.$statusOrcamento['cod'].'">'.$statusOrcamento['sts'].'</option>';
                    }
                ?>
            </select>
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