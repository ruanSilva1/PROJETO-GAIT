<?php
include('conexao.php');
$cod_fornecedor = $_GET['cod_fornecedor'];
$query = $dbh->prepare('DELETE FROM fornecedor WHERE cod_fornecedor = :cod_fornecedor');

$query->execute(array(
    ':cod_fornecedor' => $cod_fornecedor
))
?>