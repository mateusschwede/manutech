<?php
    require_once 'conect.php';
    session_start();
    if ((empty($_SESSION['nomeLogin'])) or (empty($_SESSION['senhaLogin']))) {header("location: index.php");}
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
        <div class="col-sm-12" id="menu">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <a class="navbar-brand" href="painel.php"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M70.23333,114.66667c-2.86667,-8.6 -10.75,-14.33333 -20.06667,-14.33333c-9.31667,0 -17.2,5.73333 -20.06667,14.33333h-15.76667v-17.2c0,-3.58333 2.15,-6.45 5.73333,-7.16667l24.36667,-4.3c1.43333,0 2.86667,-0.71667 3.58333,-2.15l24.36667,-24.36667c-0.71667,-2.86667 -0.71667,-6.45 -0.71667,-9.31667c0,-2.15 0,-4.3 0.71667,-6.45c-3.58333,0.71667 -7.16667,2.86667 -10.03333,5.73333l-22.93333,22.93333l-22.21667,4.3c-10.03333,2.15 -17.2,10.75 -17.2,20.78333v24.36667c0,3.58333 2.86667,7.16667 7.16667,7.16667h22.93333c2.86667,8.6 10.75,14.33333 20.06667,14.33333c9.31667,0 17.2,-5.73333 20.06667,-14.33333h22.93333v-14.33333zM50.16667,129c-4.3,0 -7.16667,-3.58333 -7.16667,-7.16667c0,-3.58333 2.86667,-7.16667 7.16667,-7.16667c4.3,0 7.16667,2.86667 7.16667,7.16667c0,4.3 -2.86667,7.16667 -7.16667,7.16667zM129,150.5c-12.18333,0 -21.5,-9.31667 -21.5,-21.5v-41.56667c-12.9,-7.88333 -21.5,-21.5 -21.5,-37.26667c0,-5.01667 0.71667,-9.31667 2.86667,-14.33333l2.86667,-8.6l25.08333,15.76667h5.01667v-5.01667l-15.76667,-25.08333l8.6,-2.86667c5.01667,-2.15 9.31667,-2.86667 14.33333,-2.86667c23.65,0 43,19.35 43,43c0,15.76667 -8.6,29.38333 -21.5,37.26667v41.56667c0,12.18333 -9.31667,21.5 -21.5,21.5zM100.33333,49.45c0,0.71667 0,0.71667 0,0c0,12.18333 6.45,22.21667 17.2,26.51667l4.3,2.15v50.88333c0,4.3 2.86667,7.16667 7.16667,7.16667c4.3,0 7.16667,-2.86667 7.16667,-7.16667v-50.88333l4.3,-2.15c10.75,-4.3 17.2,-14.33333 17.2,-25.8c0,-15.76667 -12.9,-28.66667 -29.38333,-28.66667l7.88333,12.18333v23.65h-23.65z"></path><path d="M129,14.33333c-4.3,0 -8.6,0.71667 -12.18333,2.15l12.18333,19.35v14.33333h-14.33333l-19.35,-12.18333c-1.43333,3.58333 -2.15,7.88333 -2.15,12.18333c0,14.33333 8.6,27.23333 21.5,32.96667v45.86667c0,7.88333 6.45,14.33333 14.33333,14.33333c7.88333,0 14.33333,-6.45 14.33333,-14.33333v-45.86667c12.9,-5.73333 21.5,-17.91667 21.5,-32.96667c0,-20.06667 -15.76667,-35.83333 -35.83333,-35.83333z" opacity="0.3"></path></g></g></svg> ManuTech</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item"><a class="nav-link" href="painel.php"><svg class="bi bi-house-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 3.293l6 6V13.5a1.5 1.5 0 01-1.5 1.5h-9A1.5 1.5 0 012 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 01.5-.5h1a.5.5 0 01.5.5z" clip-rule="evenodd"/><path fill-rule="evenodd" d="M7.293 1.5a1 1 0 011.414 0l6.647 6.646a.5.5 0 01-.708.708L8 2.207 1.354 8.854a.5.5 0 11-.708-.708L7.293 1.5z" clip-rule="evenodd"/></svg> Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="fornecedor.php"><svg class="bi bi-bag-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M1 4h14v10a2 2 0 01-2 2H3a2 2 0 01-2-2V4zm7-2.5A2.5 2.5 0 005.5 4h-1a3.5 3.5 0 117 0h-1A2.5 2.5 0 008 1.5z"/></svg> Fornecedores</a></li>
                        <li class="nav-item"><a class="nav-link" href="cliente.php"><svg class="bi bi-people-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 100-6 3 3 0 000 6zm-5.784 6A2.238 2.238 0 015 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 005 9c-4 0-5 3-5 4s1 1 1 1h4.216zM4.5 8a2.5 2.5 0 100-5 2.5 2.5 0 000 5z" clip-rule="evenodd"/></svg> Clientes</a></li>
                        <li class="nav-item"><a class="nav-link" href="veiculo.php"><svg class="bi bi-cone" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M7.03 1.88c.252-1.01 1.688-1.01 1.94 0L12 14H4L7.03 1.88z"/><path fill-rule="evenodd" d="M1.5 14a.5.5 0 01.5-.5h12a.5.5 0 010 1H2a.5.5 0 01-.5-.5z" clip-rule="evenodd"/></svg> Veículos</a></li>
                        <li class="nav-item active"><a class="nav-link" href="item.php"><svg class="bi bi-droplet-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 16a6 6 0 006-6c0-1.655-1.122-2.904-2.432-4.362C10.254 4.176 8.75 2.503 8 0c0 0-6 5.686-6 10a6 6 0 006 6zM6.646 4.646c-.376.377-1.272 1.489-2.093 3.13l.894.448c.78-1.559 1.616-2.58 1.907-2.87l-.708-.708z" clip-rule="evenodd"/></svg> Ítens</a></li>
                        <li class="nav-item"><a class="nav-link" href="logout.php" style="color: red;"><svg class="bi bi-power text-danger" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.578 4.437a5 5 0 104.922.044l.5-.866a6 6 0 11-5.908-.053l.486.875z" clip-rule="evenodd"/><path fill-rule="evenodd" d="M7.5 8V1h1v7h-1z" clip-rule="evenodd"/></svg> Logout</a></li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>

    <?php if($_SESSION['msgm'] != null) {echo $_SESSION['msgm']; $_SESSION['msgm']=null;} ?>

    <div class="row">
        <div class="col-sm-8">
            <h3><svg class="bi bi-droplet-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 16a6 6 0 006-6c0-1.655-1.122-2.904-2.432-4.362C10.254 4.176 8.75 2.503 8 0c0 0-6 5.686-6 10a6 6 0 006 6zM6.646 4.646c-.376.377-1.272 1.489-2.093 3.13l.894.448c.78-1.559 1.616-2.58 1.907-2.87l-.708-.708z" clip-rule="evenodd"/></svg> Ítens:</h3>
            <button type="button" class="btn btn-primary" onclick="window.location.href='addItem.php'">Novo</button><br>
            <?php
                $r = $db->query("SELECT * FROM item WHERE ativo=1 ORDER BY id DESC");
                $linhas = $r->fetchAll(PDO::FETCH_ASSOC);
                foreach($linhas as $l) {
                    echo "
                        <br>
                        <div class='list-group'>
                            <a href='updateItem.php?id=".base64_encode($l['id'])."' class='list-group-item list-group-item-action' id='cardAtivo'>
                                <div class='d-flex w-100 justify-content-between'>
                                    <h5 class='mb-1'>".$l['descricao']."</h5>
                                    <small class='text-muted'><span id='txtVerde'><strong>Código</strong> ".$l['id']."</span></small>
                                </div>
                                <p class='mb-1'><strong>R$:</strong> ".number_format($l['valor'],2,'.','')." | <strong>Fornecedor:</strong> ".$l['cnpjFornecedor']."</p>
                                <a href='inativarItem.php?id=".base64_encode($l['id'])."' class='btn btn-danger btn-sm'>Inativar</a>
                            </a>
                        </div>
                    ";
                }
            ?>
        </div>

        <div class="col-sm-4" id="teste">
            <h3><svg class="bi bi-droplet-fill text-danger" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 16a6 6 0 006-6c0-1.655-1.122-2.904-2.432-4.362C10.254 4.176 8.75 2.503 8 0c0 0-6 5.686-6 10a6 6 0 006 6zM6.646 4.646c-.376.377-1.272 1.489-2.093 3.13l.894.448c.78-1.559 1.616-2.58 1.907-2.87l-.708-.708z" clip-rule="evenodd"/></svg> Ítens Inativos:</h3>
            <?php
                $r = $db->query("SELECT * FROM item WHERE ativo=0 ORDER BY id DESC");
                $linhas = $r->fetchAll(PDO::FETCH_ASSOC);
                foreach($linhas as $l) {
                    echo "
                        <br>
                        <div class='list-group'>
                            <a href='#' class='list-group-item list-group-item-action' id='cardAtivo'>
                                <div class='d-flex w-100 justify-content-between'>
                                    <h5 class='mb-1'>".$l['descricao']."</h5>
                                    <small class='text-muted'><span id='txtVermelho'><strong>Código</strong> ".$l['id']."</span></small>
                                </div>
                                <p class='mb-1'><strong>R$:</strong> ".number_format($l['valor'],2,'.','')." | <strong>Fornecedor:</strong> ".$l['cnpjFornecedor']."</p>
                                <a href='ativarItem.php?id=".base64_encode($l['id'])."' class='btn btn-warning btn-sm'>Ativar</a>
                            </a>
                        </div>
                    ";
                }
            ?>
        </div>
    </div>


</div>
</body>
</html>