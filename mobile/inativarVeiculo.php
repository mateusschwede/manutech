<?php
    require_once 'conect.php';
    session_start();
    if(!empty($_GET['placa'])) {
        $r = $db->prepare("UPDATE veiculo SET ativo=0 WHERE placa=:placa");
        $r->execute(array(':placa'=>base64_decode($_GET['placa'])));
        $_SESSION['msgm'] = "<br><div class='alert alert-success alert-dismissible fade show' role='alert'>Veículo ".base64_decode($_GET['placa'])." inativado!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
        header("location: veiculo.php");
    }
?>