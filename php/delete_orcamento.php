<?php
include('conexao.php');
$cod_orcamento = $_GET['cod_orcamento'];
$query = $dbh->prepare('DELETE FROM orcamento WHERE cod_orcamento = :cod_orcamento');

$query->execute(array(
    ':cod_orcamento' => $cod_orcamento
))
?>