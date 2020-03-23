<?php
    require_once 'conect.php';
    session_start();
    if(!empty($_GET['cpf'])) {
        $r = $db->prepare("UPDATE cliente SET ativo=1 WHERE cpf=:cpf");
        $r->execute(array(':cpf'=>base64_decode($_GET['cpf'])));
        $_SESSION['msgm'] = "<br><div class='alert alert-success alert-dismissible fade show' role='alert'>Cpf ".base64_decode($_GET['cpf'])." ativado!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
        header("location: cliente.php");
    }
?>