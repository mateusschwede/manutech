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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="https://img.icons8.com/material-two-tone/24/000000/car-service.png"/>
    <link rel="stylesheet" href="estilo.css">
    <title>ManuTech</title>
</head>
<body id="login">
<div class="container-fluid">


    <div class="row">

        <div class="col-sm-12" id="login">
            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M70.23333,114.66667c-2.86667,-8.6 -10.75,-14.33333 -20.06667,-14.33333c-9.31667,0 -17.2,5.73333 -20.06667,14.33333h-15.76667v-17.2c0,-3.58333 2.15,-6.45 5.73333,-7.16667l24.36667,-4.3c1.43333,0 2.86667,-0.71667 3.58333,-2.15l24.36667,-24.36667c-0.71667,-2.86667 -0.71667,-6.45 -0.71667,-9.31667c0,-2.15 0,-4.3 0.71667,-6.45c-3.58333,0.71667 -7.16667,2.86667 -10.03333,5.73333l-22.93333,22.93333l-22.21667,4.3c-10.03333,2.15 -17.2,10.75 -17.2,20.78333v24.36667c0,3.58333 2.86667,7.16667 7.16667,7.16667h22.93333c2.86667,8.6 10.75,14.33333 20.06667,14.33333c9.31667,0 17.2,-5.73333 20.06667,-14.33333h22.93333v-14.33333zM50.16667,129c-4.3,0 -7.16667,-3.58333 -7.16667,-7.16667c0,-3.58333 2.86667,-7.16667 7.16667,-7.16667c4.3,0 7.16667,2.86667 7.16667,7.16667c0,4.3 -2.86667,7.16667 -7.16667,7.16667zM129,150.5c-12.18333,0 -21.5,-9.31667 -21.5,-21.5v-41.56667c-12.9,-7.88333 -21.5,-21.5 -21.5,-37.26667c0,-5.01667 0.71667,-9.31667 2.86667,-14.33333l2.86667,-8.6l25.08333,15.76667h5.01667v-5.01667l-15.76667,-25.08333l8.6,-2.86667c5.01667,-2.15 9.31667,-2.86667 14.33333,-2.86667c23.65,0 43,19.35 43,43c0,15.76667 -8.6,29.38333 -21.5,37.26667v41.56667c0,12.18333 -9.31667,21.5 -21.5,21.5zM100.33333,49.45c0,0.71667 0,0.71667 0,0c0,12.18333 6.45,22.21667 17.2,26.51667l4.3,2.15v50.88333c0,4.3 2.86667,7.16667 7.16667,7.16667c4.3,0 7.16667,-2.86667 7.16667,-7.16667v-50.88333l4.3,-2.15c10.75,-4.3 17.2,-14.33333 17.2,-25.8c0,-15.76667 -12.9,-28.66667 -29.38333,-28.66667l7.88333,12.18333v23.65h-23.65z"></path><path d="M129,14.33333c-4.3,0 -8.6,0.71667 -12.18333,2.15l12.18333,19.35v14.33333h-14.33333l-19.35,-12.18333c-1.43333,3.58333 -2.15,7.88333 -2.15,12.18333c0,14.33333 8.6,27.23333 21.5,32.96667v45.86667c0,7.88333 6.45,14.33333 14.33333,14.33333c7.88333,0 14.33333,-6.45 14.33333,-14.33333v-45.86667c12.9,-5.73333 21.5,-17.91667 21.5,-32.96667c0,-20.06667 -15.76667,-35.83333 -35.83333,-35.83333z" opacity="0.3"></path></g></g></svg>
            <h1>ManuTech</h1>
            <form action="index.php" method="post">
                <div class="form-group">
                    <input type="text" class="form-control" required name="nome" placeholder="Nome" maxlength="50" id="inputAmarelo">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" required name="senha" placeholder="Senha" maxlength="5" id="inputAmarelo">
                </div>
                <button type="submit" class="btn btn-primary">Entrar</button>
            </form>
        </div>

    </div>


</div>
</body>
</html>