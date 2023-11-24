<?php
include('../php/conexao.php');
$query = $dbh->prepare('SELECT * FROM vendas');
$query->execute();

$vendas = $query->fetchAll();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/vendasf.css">
    <link rel="shortcut icon" href="../favicon/favicon.ico" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Vendas</title>
</head>

<body>
    <div class="main-conteudo">
        <div class="pesquisa">
            <input type="text" name="pesquisar" id="pesquisar" placeholder="Search">
            <button class="bt-pesquisa"><a href="#"><img src="../imagem/lupa.png" alt="lupa"
                        class="lupa-pesquisa"></a></button>
        </div>

        <div class="new-button"></div>

        <div class="div-tabela">
            <table>
                <thead>
                    <tr>
                        <th>Cód</th>
                        <th>Nome</th>
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
                        <th>Data</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                foreach($vendas as $venda){
                    echo '<tr>';
                    echo '<td>'.$venda['cod_venda'].'</td>';
                    echo '<td>'.$venda['nome_fantasia'].'</td>';
                    echo '<td>'.$venda['descricao'].'</td>';
                    echo '<td>'.$venda['email'].'</td>';
                    echo '<td><a href="telamais.html">...</a></td>';
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
                <img src="../imagem/vendas-icon-removebg-preview.png" alt="">
                <h3>Vendas</h3>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>