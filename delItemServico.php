<?php
    require_once 'conect.php';
    session_start();
    if (!empty($_GET['id'])) {
        $idItem = base64_decode($_GET['id']);
        $r = $db->prepare("DELETE FROM itemOrdem WHERE idItem=? AND idOrdem=?");
        $r->execute(array($idItem,$_SESSION['idAberta']));

        $_SESSION['msgm'] = "<br><div class='alert alert-success alert-dismissible fade show' role='alert'>Item ".$idItem." removido à ordem ".$_SESSION['idAberta']."!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
        header("location: itemServico.php");
    }
?>