<?php
    require_once 'conect.php';
    session_start();
    if(!empty($_GET['cnpj'])) {
        $r = $db->prepare("UPDATE fornecedor SET ativo=1 WHERE cnpj=:cnpj");
        $r->execute(array(':cnpj'=>base64_decode($_GET['cnpj'])));
        $_SESSION['msgm'] = "<br><div class='alert alert-success alert-dismissible fade show' role='alert'>Cnpj ".base64_decode($_GET['cnpj'])." ativado!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
        header("location: fornecedor.php");
    }
?>