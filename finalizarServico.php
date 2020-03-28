<?php
    require_once 'conect.php';
    session_start();

    if ((!empty($_POST['servico'])) and (!empty($_POST['valorServico']))) {
        $servico = strtolower($_POST['servico']);
        $valorServico = $_POST['valorServico'];

        $r = $db->prepare("UPDATE ordem SET servico=?,valorServico=? WHERE id=?");
        $r->execute(array($servico,$valorServico,$_SESSION['idAberta']));

        //Valor total: valorServico + (sum(valorUnitItem da ordem idAberta))
        $r = $db->prepare("SELECT sum(valorTotItem) FROM itemOrdem WHERE idOrdem=?");
        $r->execute(array($_SESSION['idAberta']));
        $linhas = $r->fetchAll(PDO::FETCH_ASSOC);
        foreach ($linhas as $l) {$totItens = $l['sum(valorTotItens)'];}

        //Atualizar valorTotal na ordem
        $valorTotal = $totItens+$valorServico;
        $r = $db->prepare("UPDATE ordem SET valorTotal=? WHERE id=?");
        $r->execute(array($valorTotal,$_SESSION['idAberta']));

        //Fechar ordem
        $r = $db->prepare("UPDATE ordem SET aberta=0 WHERE id=?");
        $r->execute(array($_SESSION['idAberta']));

        unset($_SESSION['idAberta']);
        header("location: painel.php");
    }
?>