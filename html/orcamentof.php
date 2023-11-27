<?php
    include('../php/conexao.php');

    $fantasia = '';
    if(isset($_POST['nome_fantasia']))
    {
        $fantasia = $_POST['nome_fantasia'];
    }
    $query = $dbh->prepare('SELECT * FROM orcamento WHERE nome_fantasia LIKE :nome_fantasia;');
    $query->execute(array(
        'nome_fantasia' => "%$fantasia%"
    ));

    $orcamento = $query->fetchAll();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/orcamentof.css">
    <link rel="shortcut icon" href="../favicon/favicon.ico" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Orçamentos</title>
</head>

<body>
    <div class="main-conteudo">
        <div class="pesquisa">
            <form action="" method="post">
                <input type="text" name="nome_fantasia" id="pesquisar" placeholder="Pesquisar clientes">
                <input type="submit" class="bt-pesquisa" value="Pesquisar"></input>
            </form>
        </div>

        <div class="new-button">
            <button class="botao-novo"><a href="cadastro_orcamentof.php">Novo</a></button>
        </div>

        <div class="div-tabela">
            <table>
                <thead>
                    <tr>
                        <th>Cód</th>
                        <th>Nome/ Fantasia</th>
                        <th>Data Nascimento</th>
                        <th>CPF</th>
                        <th>CNPJ</th>
                        <th>Telefone</th>
                        <th>Email</th>
                        <th>CEP</th>
                        <th>Endereço</th>
                        <th>Nº Endereço</th>
                        <th>Forma Pagamento</th>
                        <th>Tipo Pessoa</th>
                        <th>Valor</th>
                        <th>Status Venda</th>
                        <th>Status Orçamento</th>
                        <th>Descrição</th>
                        <th>Pedido</th>
                        <th>Data</th>
                        <th>Editar</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                foreach($orcamento as $orcamento){
                    echo '<tr>';
                    echo '<td>'.$orcamento['cod_orcamento'].'</td>';
                    echo '<td>'.$orcamento['nome_fantasia'].'</td>';
                    echo '<td>'.$orcamento['data_nascimento'].'</td>';
                    echo '<td>'.$orcamento['cpf'].'</td>';
                    echo '<td>'.$orcamento['cnpj'].'</td>';
                    echo '<td>'.$orcamento['telefone'].'</td>';
                    echo '<td>'.$orcamento['email'].'</td>';
                    echo '<td>'.$orcamento['cep'].'</td>';
                    echo '<td>'.$orcamento['endereco'].'</td>';
                    echo '<td>'.$orcamento['n_endereco'].'</td>';
                    echo '<td>'.$orcamento['forma_pagamento'].'</td>';
                    echo '<td>'.$orcamento['tipo_pessoa'].'</td>';
                    echo '<td>'.$orcamento['valor'].'</td>';
                    echo '<td>'.$orcamento['status_venda'].'</td>';
                    echo '<td>'.$orcamento['status_orcamento'].'</td>';
                    echo '<td>'.$orcamento['descricao'].'</td>';
                    echo '<td>'.$orcamento['pedido'].'</td>';
                    echo '<td>'.$orcamento['data'].'</td>';
                    echo '<td><a href="editar_orcamentof.php?cod_orcamento='.$orcamento['cod_orcamento'].'">Editar</a></td>';
                    echo '</tr>';
                }
                ?>
                </tbody>
            </table>
        </div>

    </div>
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