<?php
    include('../php/conexao.php');
    $query = $dbh->prepare('SELECT cod_produto, nome, categoria, valor FROM produto');
    
    $query->execute();
    $produto = $query->fetchAll();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/estoquef.css">
    <link rel="shortcut icon" href="../favicon/favicon.ico" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Estoque</title>
</head>

<body>
    <div class="main-conteudo">
        <div class="pesquisa">
            <input type="text" name="pesquisar" id="pesquisar" placeholder="Search">
            <button class="bt-pesquisa"><a href="#"><img src="../imagem/lupa.png" alt="lupa"
                        class="lupa-pesquisa"></a></button>
        </div>

        <div class="new-button">
            <button class="botao-novo"><a href="cadastro_produtof.php">Novo</a></button>
        </div>

        <div class="div-tabela">
            <table>
                <thead>
                    <tr>
                        <th>Cod</th>
                        <th>Nome</th>
                        <th>Categoria</th>
                        <th>Valor</th>
                        <th>Editar</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                foreach($produto as $p){
                    echo '<tr>';
                    echo '<td>'.$p['cod_produto'].'</td>';
                    echo '<td>'.$p['nome'].'</td>';
                    echo '<td>'.$p['categoria'].'</td>';
                    echo '<td>'.$p['valor'].'</td>';
                    echo '<td><a href="editar_cadastro_produto.php?idProd='.$p['cod_produto'].'">Editar</a></td>';
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
                <img src="../imagem/estoque-icon-removebg-preview.png" alt="">
                <h3>Estoque</h3>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>