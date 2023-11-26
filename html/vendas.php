<?php
include('../php/conexao.php');

$fantasia = '';
if(isset($_POST['nome_fantasia']))
{
    $fantasia = $_POST['nome_fantasia'];
}

$query = $dbh->prepare('SELECT * FROM vendas WHERE nome_fantasia LIKE :nome_fantasia;');
$query->execute(array(
    ':nome_fantasia' => "%$fantasia%"
));

$vendas = $query->fetchAll();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/vendas.css">
    <link rel="shortcut icon" href="../favicon/favicon.ico" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Vendas</title>
</head>

<body>
    <div class="main-conteudo">
        <div class="pesquisa">
            <form action="" method="post">
                <input type="text" name="nome_fantasia" id="pesquisar" placeholder="Pesquisar">
                <input type="submit" class="bt-pesquisa" value="Pesquisar"></input>
            </form>
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
                    echo '<td>'.$venda['data_nascimento'].'</td>';
                    echo '<td>'.$venda['cpf'].'</td>';
                    echo '<td>'.$venda['cnpj'].'</td>';
                    echo '<td>'.$venda['telefone'].'</td>';
                    echo '<td>'.$venda['email'].'</td>';
                    echo '<td>'.$venda['cep'].'</td>';
                    echo '<td>'.$venda['endereco'].'</td>';
                    echo '<td>'.$venda['n_endereco'].'</td>';
                    echo '<td>'.$venda['forma_pagamento'].'</td>';
                    echo '<td>'.$venda['tipo_pessoa'].'</td>';
                    echo '<td>'.$venda['valor'].'</td>';
                    echo '<td>'.$venda['status_venda'].'</td>';
                    echo '<td>'.$venda['status_orcamento'].'</td>';
                    echo '<td>'.$venda['descricao'].'</td>';
                    echo '<td>'.$venda['data'].'</td>';
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
            <a class="link" href="inicio.html">Inicio</a>
                <a class="link" href="fornecedores.php">Fornecedores</a>
                <a class="link" href="funcionarios.php">Funcionários</a>
                <a class="link" href="materiaprima.php">Matéria prima</a>

                <div class="button-location">
                    <div class="dropdown">
                        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Acessar Tabelas
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="vendas.php">Vendas</a></li>
                            <li><a class="dropdown-item" href="orcamentos.php">Orcamento</a></li>
                            <li><a class="dropdown-item" href="estoque.php">Estoque</a></li>
                            <li><a class="dropdown-item" href="clientes.php">Clientes</a></li>
                        </ul>
                    </div>
                </div>
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