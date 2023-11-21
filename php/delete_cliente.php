<?php
include('conexao.php');
$cod_cliente = $_GET['cod_cliente'];
$query = $dbh->prepare('DELETE FROM cliente WHERE cod_cliente = :cod_cliente');

$query->execute(array(
    ':cod_cliente' => $cod_cliente
))
?>