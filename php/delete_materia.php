<?php
include('conexao.php');
$cod_materia = $_GET['cod_materia'];
$query = $dbh->prepare('DELETE FROM materia_prima WHERE cod_materia = :cod_materia');

$query->execute(array(
    ':cod_materia' => $cod_materia
))
?>