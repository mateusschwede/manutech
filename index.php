<?php
require_once 'conect.php';

if((!empty($_POST['nome'])) and (!empty($_POST['senha']))) {
    $r = $db->prepare("SELECT nome,senha FROM usuario WHERE nome=:nome AND senha=:senha");
    $r->execute(array(':nome'=>strtolower($_POST['nome']),':senha'=>strtolower($_POST['senha'])));
    if($r->rowCount()>0) {
        session_start();
        $_SESSION['nomeLogin'] = strtolower($_POST['nome']);
        $_SESSION['senhaLogin'] = strtolower($_POST['senha']);
        header("location: painel.php");
    }
}
?>

<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
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