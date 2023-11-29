<?php
    include('../php/conexao.php');

    $nome = '';
    if(isset($_POST['nome']))
    {
        $nome = $_POST['nome'];
    }
    $query = $dbh->prepare('SELECT * FROM cliente WHERE nome LIKE :nome;');
    $query->execute(array(
        ':nome' => "%$nome%"
    ));

    $clientes = $query->fetchAll();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/clientesf.css">
    <link rel="shortcut icon" href="../favicon/favicon.ico" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Clientes</title>
</head>

<body>
    <div class="main-conteudo">
        <div class="pesquisa">
            <form action="" method="post">
                <input type="text" name="nome" id="pesquisar" placeholder="Pesquisar clientes">
                <input type="submit" class="bt-pesquisa" value="Pesquisar"></input>
            </form>
        </div>

        <div class="new-button">
            <button class="botao-novo"><a href="cadastro_clientesf.php">Novo</a></button>
        </div>

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
                        <th>RG</th>
                        <th>Endereço</th>
                        <th>Cidade</th>
                        <th>Nº Endereço</th>
                        <th>Status Cliente</th>
                        <th>Bairro</th>
                        <th>Tipo Pessoa</th>
                        <th>Data</th>
                        <th>Editar</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                foreach($clientes as $cliente){
                    echo '<tr>';
                    echo '<td>'.$cliente['cod_cliente'].'</td>';
                    echo '<td>'.$cliente['nome'].'</td>';
                    echo '<td>'.$cliente['data_nascimento'].'</td>';
                    echo '<td>'.$cliente['cpf'].'</td>';
                    echo '<td>'.$cliente['cnpj'].'</td>';
                    echo '<td>'.$cliente['telefone'].'</td>';
                    echo '<td>'.$cliente['email'].'</td>';
                    echo '<td>'.$cliente['cep'].'</td>';
                    echo '<td>'.$cliente['rg'].'</td>';
                    echo '<td>'.$cliente['endereco'].'</td>';
                    echo '<td>'.$cliente['cidade'].'</td>';
                    echo '<td>'.$cliente['n_endereco'].'</td>';
                    echo '<td>'.$cliente['status_cliente'].'</td>';
                    echo '<td>'.$cliente['bairro'].'</td>';
                    echo '<td>'.$cliente['tipo_pessoa'].'</td>';
                    echo '<td>'.$cliente['data'].'</td>';
                    echo '<td><a href="editar_cadastro_clientef.php?cod_cliente='.$cliente['cod_cliente'].'">Editar</a></td>';
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
                <a class="link" href="orcamentof.php">Orçamento</a>
                <a class="link" href="estoquef.php">Estoque</a>
                <a class="link" href="clientef.php">Clientes</a>
            </nav>
            <div class="local">
                <img src="../imagem/clientexxx-removebg-preview.png" alt="">
                <h3>Clientes</h3>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>