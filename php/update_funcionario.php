<?php
    include('conexao.php');

    if(isset($_POST['cod_funcionario'], $_POST['nome'], $_POST['data_nascimento'], $_POST['cpf'], $_POST['telefone'], $_POST['email'], $_POST['cep'], $_POST['rg'], $_POST['endereco'], $_POST['cidade'], $_POST['n_endereco'], $_POST['bairro'], $_POST['status_funcionario'], $_POST['usuario'], $_POST['senha']) && ($_POST['nome']!='') && ($_POST['data_nascimento']!='') && ($_POST['cpf']!='') && ($_POST['telefone']!='') && ($_POST['email']!='') && ($_POST['cep']!='') && ($_POST['rg']!='') && ($_POST['endereco']!='') && ($_POST['cidade']!='') && ($_POST['n_endereco']!='') && ($_POST['bairro']!='') && ($_POST['status_funcionario']!='') && ($_POST['usuario']!='') && ($_POST['senha']!='')){

        $cod_funcionario = $_POST['cod_funcionario'];
        $nome = $_POST['nome'];
        $data_nascimento = $_POST['data_nascimento'];
        $cpf = $_POST['cpf'];
        $telefone = $_POST['telefone'];
        $email = $_POST['email'];
        $cep = $_POST['cep'];
        $rg = $_POST['rg'];
        $endereco = $_POST['endereco'];
        $cidade = $_POST['cidade'];
        $n_endereco = $_POST['n_endereco'];
        $bairro = $_POST['bairro'];
        $status_funcionario = $_POST['status_funcionario'];
        $usuario = $_POST['usuario'];
        $senha = $_POST['senha'];

    }else{
        echo 'Variaveis não definidas';
    }

    try{

        $query = $dbh->prepare('UPDATE funcionario SET nome=:nome, data_nascimento=:data_nascimento, cpf=:cpf, telefone=:telefone, email=:email, cep=:cep, rg=:rg, endereco=:endereco, cidade=:cidade, n_endereco=:n_endereco, bairro=:bairro, status_funcionario=:status_funcionario, usuario=:usuario, senha=:senha WHERE cod_funcionario=:cod_funcionario');

        $query->execute(array(

            ':nome' => $nome,
            ':data_nascimento' => $data_nascimento,
            ':cpf' => $cpf,
            ':telefone' => $telefone,
            ':email' => $email,
            ':cep' => $cep,
            ':rg' => $rg,
            ':endereco' => $endereco,
            ':cidade' => $cidade,
            ':n_endereco' => $n_endereco,
            ':bairro' => $bairro,
            ':status_funcionario' => $status_funcionario,
            ':usuario' => $usuario,
            ':senha' => $senha,
            ':cod_funcionario' => $cod_funcionario

        ));

        header('Location: ../html/funcionarios.php');

    }catch(PDOException $e){

        throw new MyDatabaseException($Exception -> getMessage(), (int)$Exception -> getCode());
    }

?>

