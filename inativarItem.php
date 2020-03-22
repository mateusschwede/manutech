<?php
    require_once 'conect.php';
    session_start();
    if(!empty($_GET['id'])) {
        $r = $db->prepare("UPDATE item SET ativo=0 WHERE id=:id");
        $r->execute(array(':id'=>base64_decode($_GET['id'])));
        $_SESSION['msgm'] = "<br><div class='alert alert-success alert-dismissible fade show' role='alert'>Item código ".base64_decode($_GET['id'])." inativado!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
        header("location: item.php");
    }
?>