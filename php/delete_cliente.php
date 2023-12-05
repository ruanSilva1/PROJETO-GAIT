<?php
    include('conexao.php');

    $cod_cliente = $_GET['cod_cliente'];
    try{
        $query = $dbh->prepare('DELETE FROM cliente WHERE cod_cliente = :cod_cliente');

        $query->execute(array(
            ':cod_cliente' => $cod_cliente
        ));
    
        header('Location: ../html/clientes.php?deletado');
    }catch(PDOException $e){
        header('Location: ../html/clientes.php?dl');
    }
?>