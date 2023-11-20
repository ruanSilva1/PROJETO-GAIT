<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/cadastro_materia_prima.css">
    <link rel="shortcut icon" href="../favicon/favicon.ico" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Editar Matéria prima</title>
</head>

<body>
    <form action="#" method="post">
        <input type="submit" value="Salvar">
        <div class="column-1">
            <label for="nome">Nome matéria</label>
            <input type="text" name="nome" id="nome">
        </div>
        <div class="column-2">
            <label for="valor">Valor</label>
            <input type="text" name="valor" id="valor">
        </div>
        <div class="column-3">
            <label for="quantidade">Quantidade</label>
            <input type="number" name="quantidade" id="quantidade">
        </div>
        <div class="column-4">
            <label for="descricao">Descrição</label>
            <input type="text" name="descricao" id="descricao">
        </div>
        <div class="column-5">
            <label for="categoria">Categoria</label>
            <select name="categoria" id="categoria">
                <option value="#">lorem</option>
                <option value="#">lorem</option>
                <option value="#">lorem</option>
                <option value="#">lorem</option>
            </select>
        </div>
        <div class="column-6">
            <label for="status">Status matéria</label>
            <select name="status" id="status">
                <option value="#">lorem</option>
                <option value="#">lorem</option>
                <option value="#">lorem</option>
                <option value="#">lorem</option>
            </select>
        </div>
        <div class="column-7">
            <label for="observacao">Observações</label>
            <textarea name="observacao" id="observacao"></textarea>
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
                            <li><a class="dropdown-item" href="vendas.php">Vendas</a></li>
                            <li><a class="dropdown-item" href="orcamentos.php">Orcamento</a></li>
                            <li><a class="dropdown-item" href="estoque.php">Estoque</a></li>
                            <li><a class="dropdown-item" href="clientes.php">Clientes</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="local">
                <img src="../imagem/icon-materia-prima-removebg-preview.png" alt="">
                <h3>Matéria prima</h3>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>