<?php
    require_once 'conect.php';
    session_start();
    if ((empty($_SESSION['nomeLogin'])) or (empty($_SESSION['senhaLogin']))) {header("location: index.php");}

    /*
     * add idItem,qtde,vlrTot(relacionar qtde*vlrUnit tab item) em itemOrdem where idOrdem=varComIdOrdem
     * ñ pd inserir 2 itens iguais
     */
    if ((!empty($_POST['item'])) and (!empty($_POST['qtde']))) {
        $item = $_POST['item'];
        $qtde = $_POST['item'];

        $r = $db->prepare("SELECT idItem FROM itemOrdem WHERE idOrdem=? AND idItem=?");
        $r->execute(array($_SESSION['idAberta'],$item));

        if ($r->rowCount()>0) {$_SESSION['msgm'] = "<br><div class='alert alert-danger alert-dismissible fade show' role='alert'>Item ".$item." já adicionado à ordem ".$_SESSION['idAberta']."!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";}
        else {
            $r = $db->prepare("SELECT valor FROM item WHERE id=?");
            $r->execute(array($item));
            $linhas = $r->fetchAll(PDO::FETCH_ASSOC);
            foreach ($linhas as $l) {$valorUnit = $l['valor'];}
            $valorTotItem = $valorUnit*$qtde;

            $r = $db->prepare("INSERT INTO itemOrdem(idOrdem,idItem,qtItem,valorTotItem) VALUES (?,?,?,?)");
            $r->execute(array($_SESSION['idAberta'],$item,$qtde,$valorTotItem));

            $_SESSION['msgm'] = "<br><div class='alert alert-success alert-dismissible fade show' role='alert'>Item ".$item." adicionado à ordem ".$_SESSION['idAberta']."!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
            header("location: itemServico.php");
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
        <div class="col-sm-12" id="menu">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand disable"><img src="https://img.icons8.com/material-two-tone/30/000000/car-service.png" class="d-inline-block align-top"> ManuTech</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item active"><a class="nav-link disable"><svg class="bi bi-house-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 3.293l6 6V13.5a1.5 1.5 0 01-1.5 1.5h-9A1.5 1.5 0 012 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 01.5-.5h1a.5.5 0 01.5.5z" clip-rule="evenodd"/><path fill-rule="evenodd" d="M7.293 1.5a1 1 0 011.414 0l6.647 6.646a.5.5 0 01-.708.708L8 2.207 1.354 8.854a.5.5 0 11-.708-.708L7.293 1.5z" clip-rule="evenodd"/></svg> Home</a></li>
                        <li class="nav-item"><a class="nav-link disable"><svg class="bi bi-bag-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M1 4h14v10a2 2 0 01-2 2H3a2 2 0 01-2-2V4zm7-2.5A2.5 2.5 0 005.5 4h-1a3.5 3.5 0 117 0h-1A2.5 2.5 0 008 1.5z"/></svg> Fornecedores</a></li>
                        <li class="nav-item"><a class="nav-link disable"><svg class="bi bi-people-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 100-6 3 3 0 000 6zm-5.784 6A2.238 2.238 0 015 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 005 9c-4 0-5 3-5 4s1 1 1 1h4.216zM4.5 8a2.5 2.5 0 100-5 2.5 2.5 0 000 5z" clip-rule="evenodd"/></svg> Clientes</a></li>
                        <li class="nav-item"><a class="nav-link disable"><svg class="bi bi-cone" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M7.03 1.88c.252-1.01 1.688-1.01 1.94 0L12 14H4L7.03 1.88z"/><path fill-rule="evenodd" d="M1.5 14a.5.5 0 01.5-.5h12a.5.5 0 010 1H2a.5.5 0 01-.5-.5z" clip-rule="evenodd"/></svg> Veículos</a></li>
                        <li class="nav-item"><a class="nav-link disable"><svg class="bi bi-droplet-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 16a6 6 0 006-6c0-1.655-1.122-2.904-2.432-4.362C10.254 4.176 8.75 2.503 8 0c0 0-6 5.686-6 10a6 6 0 006 6zM6.646 4.646c-.376.377-1.272 1.489-2.093 3.13l.894.448c.78-1.559 1.616-2.58 1.907-2.87l-.708-.708z" clip-rule="evenodd"/></svg> Ítens</a></li>
                        <li class="nav-item"><a class="nav-link disable"><svg class="bi bi-power" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.578 4.437a5 5 0 104.922.044l.5-.866a6 6 0 11-5.908-.053l.486.875z" clip-rule="evenodd"/><path fill-rule="evenodd" d="M7.5 8V1h1v7h-1z" clip-rule="evenodd"/></svg> Logout</a></li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>

    <?php if($_SESSION['msgm'] != null) {echo $_SESSION['msgm']; $_SESSION['msgm']=null;} ?>

    <div class="row">
        <div class="col-sm-12">
            <h3><svg class="bi bi-wrench" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M.102 2.223A3.004 3.004 0 003.78 5.897l6.341 6.252A3.003 3.003 0 0013 16a3 3 0 10-.851-5.878L5.897 3.781A3.004 3.004 0 002.223.1l2.141 2.142L4 4l-1.757.364L.102 2.223zm13.37 9.019L13 11l-.471.242-.529.026-.287.445-.445.287-.026.529L11 13l.242.471.026.529.445.287.287.445.529.026L13 15l.471-.242.529-.026.287-.445.445-.287.026-.529L15 13l-.242-.471-.026-.529-.445-.287-.287-.445-.529-.026z" clip-rule="evenodd"/></svg><svg class="bi bi-droplet-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 16a6 6 0 006-6c0-1.655-1.122-2.904-2.432-4.362C10.254 4.176 8.75 2.503 8 0c0 0-6 5.686-6 10a6 6 0 006 6zM6.646 4.646c-.376.377-1.272 1.489-2.093 3.13l.894.448c.78-1.559 1.616-2.58 1.907-2.87l-.708-.708z" clip-rule="evenodd"/></svg> Adicionar ítens:</h3>
            <form action="addItemServico.php" method="post">
                <div class="form-group">
                    <label for="selectItem">Selecione o ítem</label>
                    <select class="form-control" id="selectItem" name="item">
                        <?php
                            $r = $db->query("SELECT id,descricao FROM item WHERE ativo=1");
                            $linhas = $r->fetchAll(PDO::FETCH_ASSOC);
                            foreach($linhas as $l) {echo "<option value=".$l['id'].">".$l['id']." ".$l['descricao']."</option>";}
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <input type="number" class="form-control" required name="qtde" placeholder="Quantidade" min=0 max=1000000>
                </div>
                <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                    <div class="btn-group mr-2" role="group">
                        <a href="itemServico.php" class="btn btn-danger">Cancelar</a>
                    </div>
                    <div class="btn-group mr-2" role="group">
                        <button type="submit" class="btn btn-primary">Adicionar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


</div>
</body>
</html>