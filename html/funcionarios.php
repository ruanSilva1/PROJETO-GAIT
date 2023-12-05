<?php
    include('../php/conexao.php');

    $name = '';
    if(isset($_POST['nome']))
    {
        $name = $_POST['nome'];
    }
    $query = $dbh->prepare('SELECT * FROM funcionario WHERE nome LIKE :nome;');
    $query->execute(array(
        ':nome' => "%$name%"
    ));

    $funcionario = $query->fetchAll();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/funcionario.css">
    <link rel="shortcut icon" href="../favicon/favicon.ico" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Funcionários</title>
</head>

<body>
    <div class="main-conteudo">
        <div class="pesquisa">
            <form action="" method="post">
                <input type="text" name="nome" id="pesquisar" placeholder="Pesquisar">
                <input type="submit" class="bt-pesquisa" value="Pesquisar"></input>
            </form>
        </div>

        <div class="new-button">
            <button class="botao-novo"><a href="cadastro_funcionarios.php">Novo</a></button>
        </div>

        <div class="div-tabela">
            <table>
                <thead>
                    <tr>
                        <th>Cód</th>
                        <th>Nome</th>
                        <th>Data Nascimento</th>
                        <th>CPF</th>
                        <th>Telefone</th>
                        <th>Email</th>
                        <th>CEP</th>
                        <th>RG</th>
                        <th>Endereço</th>
                        <th>Cidade</th>
                        <th>Nº Endereço</th>
                        <th>Bairro</th>
                        <th>Status</th>
                        <th>Usuário</th>
                        <th>Senha</th>
                        <th>Data</th>
                        <th>Editar</th>
                        <th>Excluir</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach($funcionario as $f){
                            echo '<tr>';
                            echo '<td>'.$f['cod_funcionario'].'</td>';
                            echo '<td>'.$f['nome'].'</td>';
                            echo '<td>'.$f['data_nascimento'].'</td>';
                            echo '<td>'.$f['cpf'].'</td>';
                            echo '<td>'.$f['telefone'].'</td>';
                            echo '<td>'.$f['email'].'</td>';
                            echo '<td>'.$f['cep'].'</td>';
                            echo '<td>'.$f['rg'].'</td>';
                            echo '<td>'.$f['endereco'].'</td>';
                            echo '<td>'.$f['cidade'].'</td>';
                            echo '<td>'.$f['n_endereco'].'</td>';
                            echo '<td>'.$f['bairro'].'</td>';
                            echo '<td>'.$f['status_funcionario'].'</td>';
                            echo '<td>'.$f['usuario'].'</td>';
                            echo '<td>'.$f['senha'].'</td>';
                            echo '<td>'.$f['data'].'</td>';
                            echo '<td><a href="editar_cadastro_funcionario.php?cod_funcionario='.$f['cod_funcionario'].'">Editar</a></td>';
                            echo '<td><a href="../php/delete_funcionario.php?cod_funcionario='.$f['cod_funcionario'].'">Excluir</a></td>';
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
                    <a href="index.php"><img class="imagem-logo" src="../imagem/SOFTWARE-GAIT-LOGO.png"
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
                            <li><a class="dropdown-item" href="orcamentos.php">Orcamento</a></li>
                            <li><a class="dropdown-item" href="estoque.php">Estoque</a></li>
                            <li><a class="dropdown-item" href="clientes.php">Clientes</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="local">
            <img src="../imagem/funcionario-icon-removebg-preview.png" alt="">
                <h3>Funcionários</h3>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>

<?php
if(isset($_GET['editado'])){
    echo "<script>alert('Cadastro atualizado com sucesso!')</script>";
}
?>