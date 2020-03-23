<?php
require_once 'conect.php';

if((!empty($_POST['nome'])) and (!empty($_POST['senha']))) {
    $r = $db->prepare("SELECT nome,senha FROM usuario WHERE nome=:nome AND senha=:senha");
    $r->execute(array(':nome'=>strtolower($_POST['nome']),':senha'=>strtolower($_POST['senha'])));
    if($r->rowCount()>0) {
        session_start();
        $_SESSION['nomeLogin'] = strtolower($_POST['nome']);
        $_SESSION['senhaLogin'] = strtolower($_POST['senha']);
        $_SESSION['msgm'] = null;
        header("location: painel.php");
    }
}
?>

<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://unpkg.com/onsenui/css/onsenui.css">
    <link rel="stylesheet" href="https://unpkg.com/onsenui/css/onsen-css-components.min.css">
    <script src="https://unpkg.com/onsenui/js/onsenui.min.js"></script>
    <link rel="shortcut icon" href="https://img.icons8.com/material-two-tone/24/000000/car-service.png"/>
    <link rel="stylesheet" href="estilo.css">
    <title>ManuTech</title>
</head>
<body>
<div class="container-fluid">


    <div class="row">

        <div class="col-sm-12" id="login">
            <img src="https://img.icons8.com/material-two-tone/100/000000/car-service.png">
            <h1>ManuTech</h1>
            <form action="index.php" method="post">
                <div class="form-group">
                    <input type="text" class="form-control" name="nome" placeholder="Nome" maxlength="50">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="senha" placeholder="Senha" maxlength="5">
                </div>
                <button type="submit" class="btn btn-primary">Entrar</button>
            </form>
        </div>

    </div>


</div>
</body>
</html>