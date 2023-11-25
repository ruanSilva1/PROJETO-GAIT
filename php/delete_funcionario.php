<?php
    include('conexao.php');

    $cod_funcionario = $_GET['cod_funcionario'];
    $query = $dbh->prepare('DELETE FROM funcionario WHERE cod_funcionario = :cod_funcionario');

    $query->execute(array(
        ':cod_funcionario' => $cod_funcionario
    ));

    header('Location: ../html/funcionarios.php');
    echo "<script>alert('Excluido com sucesso!')</script>";
?>