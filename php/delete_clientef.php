<?php
    include('conexao.php');

    $cod_cliente = $_GET['cod_cliente'];
    $query = $dbh->prepare('DELETE FROM cliente WHERE cod_cliente = :cod_cliente');

    $query->execute(array(
    ':cod_cliente' => $cod_cliente
));
    
    header('Location: ../html/clientef.php');
    echo "<script>alert('Excluido com sucesso!')</script>";
?>