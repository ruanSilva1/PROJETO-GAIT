<?php
    include('../php/conexao.php');

    $query = $dbh->prepare('SELECT * FROM sigla');
    $query->execute();

    $sigla = $query->fetchAll();

    $squery = $dbh->prepare('SELECT * FROM sts_fornecedor');
    $squery->execute();

    $status = $squery->fetchAll();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/cadastro_fornecedores.css">
    <link rel="shortcut icon" href="../favicon/favicon.ico" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Cadastro Fornecedores</title>
</head>

<body>
    <form action="../php/inserir_fornecedor.php" method="post">
        <input type="submit" value="Salvar">
        <div class="column-1">
            <label for="nome_fantasia">Nome/ Fantasia *</label>
            <input type="text" name="nome_fantasia" id="nome_fantasia" minlength="1" maxlength="50" required>
        </div>
        <div class="column-2">
            <label for="razao_social">Razão social *</label>
            <input type="text" name="razao_social" id="razao_social" minlength="1" maxlength="50" required>
        </div>
        <div class="column-3">
            <label for="cnpj">CNPJ *</label>
            <input type="number" name="cnpj" id="cnpj"  minlength="14" maxlength="14" required>
        </div>
        <div class="column-4">
            <label for="telefone">Telefone *</label>
            <input type="tel" name="telefone" id="telefone" minlength="1" maxlength="11" required>
        </div>
        <div class="column-5">
            <label for="email">Email *</label>
            <input type="email" name="email" id="email" minlength="1" maxlength="60" required>
        </div>
        <div class="column-6">
            <label for="cep">CEP *</label>
            <input type="number" name="cep" id="cep" minlength="8" maxlength="8" required>
        </div>
        <div class="column-7">
            <label for="endereco">Endereço</label>
            <input type="text" name="endereco" id="endereco" minlength="1" maxlength="50" required>
        </div>
        <div class="column-8">
            <label for="cidade">Cidade</label>
            <input type="text" name="cidade" id="cidade" minlength="1" maxlength="50" required>
        </div>
        <div class="column-9">
            <label for="n_endereco">Nº endereço</label>
            <input type="number" name="n_endereco" id="n_endereco" required>
        </div>
        <div class="column-10">
            <label for="uf">UF</label>
            <select name="uf" id="uf" required>
                <?php
                    foreach($sigla as $sigla){
                        echo '<option value="'.$sigla['sigla_estado'].'">'.$sigla['uf_estado'].'</option>';
                    }
                ?>
            </select>
        </div>
        <div class="column-11">
            <label for="bairro">Bairro</label>
            <input type="text" name="bairro" id="bairro" minlength="1" maxlength="50" required>
        </div>
        <div class="column-12">
            <label for="status_fornecedor">Status fornecedor</label>
            <select name="status_fornecedor" id="status_fornecedor" required>
                <?php
                    foreach($status as $status){
                        echo '<option value="'.$status['cod'].'">'.$status['sts'].'</option>';
                    }
                ?>
            </select>
        </div>
    </form>

    <div class="main">
        <div class="navbar">
            <div class="logo">
                <button><a href="index.html"><img class="imagem-logo" src="../imagem/SOFTWARE-GAIT-LOGO.png"
                            alt=""></a></button>
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

<?php
if(isset($_GET['message'])){
    echo "<script>alert('Cadastro não realizado!')</script>";
}
?>