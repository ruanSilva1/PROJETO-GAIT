<?php
    include('../php/conexao.php');

    $fantasia = '';
    if(isset($_POST['fantasia'])){
       $fantasia = $_POST['fantasia']; 
    }
    
    
    $query = $dbh->prepare("SELECT * FROM fornecedor WHERE nome_fantasia LIKE :fantasia;");
    $query->execute(array(
        ':fantasia' => "%$fantasia%"
    ));

    $fornecedor = $query->fetchAll();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/fornecedores.css">
    <link rel="shortcut icon" href="../favicon/favicon.ico" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Fornecedores</title>
</head>

<body>
    <div class="main-conteudo">
        <div class="pesquisa">
            <form action="" method="post">
                <input type="text" name="fantasia" id="pesquisar" placeholder="Search">
                <input type="submit" class="bt-pesquisa" value="Pesquisar"></input>
            </form>
        </div>

        <div class="new-button">
            <button class="botao-novo"><a href="cadastro_fornecedores.php">Novo</a></button>
        </div>

        <div class="div-tabela">
            <table>
                <thead>
                    <tr>
                        <th>Cód</th>
                        <th>Nome/ Fantasia</th>
                        <th>Razão Social</th>
                        <th>CNPJ</th>
                        <th>Telefone</th>
                        <th>Email</th>
                        <th>CEP</th>
                        <th>Endereço</th>
                        <th>Cidade</th>
                        <th>UF</th>
                        <th>Nº Endereço</th>
                        <th>Bairro</th>
                        <th>Status</th>
                        <th>Data</th>
                        <th>Editar</th>
                        <th>Excluir</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                foreach($fornecedor as $f){
                    echo '<tr>';
                    echo '<td>'.$f['cod_fornecedor'].'</td>';
                    echo '<td>'.$f['nome_fantasia'].'</td>';
                    echo '<td>'.$f['razao_social'].'</td>';
                    echo '<td>'.$f['cnpj'].'</td>';
                    echo '<td>'.$f['telefone'].'</td>';
                    echo '<td>'.$f['email'].'</td>';
                    echo '<td>'.$f['cep'].'</td>';
                    echo '<td>'.$f['endereco'].'</td>';
                    echo '<td>'.$f['cidade'].'</td>';
                    echo '<td>'.$f['uf'].'</td>';
                    echo '<td>'.$f['n_endereco'].'</td>';
                    echo '<td>'.$f['bairro'].'</td>';
                    echo '<td>'.$f['status_fornecedor'].'</td>';
                    echo '<td>'.$f['data'].'</td>';
                    echo '<td><a href="editar_cadastro_fornecedores.php?cod_fornecedor='.$f['cod_fornecedor'].'">Editar</a></td>';
                    echo '<td><a href="../php/delete_fornecedor.php?cod_fornecedor='.$f['cod_fornecedor'].'">Excluir</a></td>';
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
                <img src="../imagem/fornecedores-removebg-preview.png" alt="">
                <h3>Fornecedores</h3>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>