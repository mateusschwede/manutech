<?php
    require_once 'conect.php';
    session_start();

    $r = $db->prepare("DELETE FROM itemOrdem WHERE idOrdem=?");
    $r->execute(array($_SESSION['idAberta']));
    $idAberta = $_SESSION['idAberta'];
    unset($_SESSION['idAberta']);

    $r = $db->exec("DELETE FROM ordem WHERE aberta=1");
    $_SESSION['msgm'] = "<br><div class='alert alert-warning alert-dismissible fade show' role='alert'>Ordem ".$idAberta." cancelada!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
    header("location: painel.php");
?>