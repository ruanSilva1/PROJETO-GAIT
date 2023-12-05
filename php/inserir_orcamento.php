<?php
include('conexao.php');

    if(isset($_POST['pedido'], $_POST['valor'], $_POST['forma_pagamento'], $_POST['descricao'], $_POST['status_venda'], $_POST['status_orcamento']) && ($_POST['pedido']!='') && ($_POST['valor']!='') && ($_POST['forma_pagamento']!='') && ($_POST['descricao']!='') && ($_POST['status_venda']!='') && ($_POST['status_orcamento'])){
        $id_cliente = $_POST['id_cliente'];
        $pedido = $_POST['pedido'];
        $valor = $_POST['valor'];
        $forma_pagamento = $_POST['forma_pagamento'];
        $descricao = $_POST['descricao'];
        $status_venda = $_POST['status_venda'];
        $status_orcamento = $_POST['status_orcamento'];
    }else{
        return die("Campos vazios");
    }

    try{
        $query = $dbh->prepare('INSERT INTO orcamento (id_cliente, forma_pagamento, valor, status_venda, status_orcamento, descricao, pedido) 
        VALUES (:id_cliente, :forma_pagamento, :valor, :status_venda, :status_orcamento, :descricao, :pedido);');

        $query->execute(array(
            ':id_cliente' => $id_cliente,
            ':pedido' => $pedido,
            ':valor' => $valor,
            ':forma_pagamento' => $forma_pagamento,
            ':descricao' => $descricao,
            ':status_venda' => $status_venda,
            ':status_orcamento' => $status_orcamento
        ));

        header('Location: ../html/cadastro_orcamento.php?cadastrado');

    }catch(PDOException $e){
        echo $e;
    }
?>