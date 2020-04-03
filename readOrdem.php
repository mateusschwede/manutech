<?php
    require_once 'conect.php';
    session_start();
    if ((empty($_SESSION['nomeLogin'])) or (empty($_SESSION['senhaLogin']))) {header("location: index.php");}

    if (!empty($_GET['id'])) {$idOrdem = base64_decode($_GET['id']);}
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
        <div class="col-sm-12">
            <h2><u>Ordem de serviço <?php echo $idOrdem ?>:</u></h2>
            <?php
                $r = $db->prepare("SELECT * FROM ordem WHERE id=?");
                $r->execute(array($idOrdem));
                $linhas = $r->fetchAll(PDO::FETCH_ASSOC);
                foreach ($linhas as $l) {
                    echo "
                        <small><strong>Emissão:</strong> ".$l['dataRegistro']."</small>
                        
                        <hr>
                        <h4><svg class='bi bi-people-fill ' width='1em' height='1em' viewBox='0 0 16 16' fill='currentColor' xmlns='http://www.w3.org/2000/svg'><path fill-rule='evenodd' d='M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 100-6 3 3 0 000 6zm-5.784 6A2.238 2.238 0 015 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 005 9c-4 0-5 3-5 4s1 1 1 1h4.216zM4.5 8a2.5 2.5 0 100-5 2.5 2.5 0 000 5z' clip-rule='evenodd'/></svg> <strong>Dados do proprietário:</strong></h4>
                        <p><strong>Cpf: </strong>".$l['cpfProprietario']." | <strong>Placa: </strong>".$l['placaVeiculo']."</p>
                        
                        <hr>
                        <h4><svg class='bi bi-wrench' width='1em' height='1em' viewBox='0 0 16 16' fill='currentColor' xmlns='http://www.w3.org/2000/svg'><path fill-rule='evenodd' d='M.102 2.223A3.004 3.004 0 003.78 5.897l6.341 6.252A3.003 3.003 0 0013 16a3 3 0 10-.851-5.878L5.897 3.781A3.004 3.004 0 002.223.1l2.141 2.142L4 4l-1.757.364L.102 2.223zm13.37 9.019L13 11l-.471.242-.529.026-.287.445-.445.287-.026.529L11 13l.242.471.026.529.445.287.287.445.529.026L13 15l.471-.242.529-.026.287-.445.445-.287.026-.529L15 13l-.242-.471-.026-.529-.445-.287-.287-.445-.529-.026z' clip-rule='evenodd'/></svg> <strong>Serviço prestado:</strong></h4>
                        <p><strong>Descrição:</strong> ".$l['servico']."</p>
                        <p><strong>Valor:</strong> R$ ".number_format($l['valorServico'],2,',','')."</p>
                                              
                        <hr>
                        <h4><strong>Total: R$ ".number_format($l['valorTotal'],2,',','')."</strong></h4>
                        
                        <hr>
                        <h4><svg class='bi bi-droplet-fill' width='1em' height='1em' viewBox='0 0 16 16' fill='currentColor' xmlns='http://www.w3.org/2000/svg'><path fill-rule='evenodd' d='M8 16a6 6 0 006-6c0-1.655-1.122-2.904-2.432-4.362C10.254 4.176 8.75 2.503 8 0c0 0-6 5.686-6 10a6 6 0 006 6zM6.646 4.646c-.376.377-1.272 1.489-2.093 3.13l.894.448c.78-1.559 1.616-2.58 1.907-2.87l-.708-.708z' clip-rule='evenodd'/></svg> <strong>Ítens utilizados:</strong></h4>
                    ";
                    // SELECT pra ver se há itens cadastrados na ordem $_SESSION['aberta']. Se há, cadastra normal, senão mostra mensagem
                }

                $r = $db->prepare("SELECT * FROM itemOrdem WHERE idOrdem=?");
                $r->execute(array($idOrdem));
                $linhas = $r->fetchAll(PDO::FETCH_ASSOC);

                foreach ($linhas as $l) {
                    $r2 = $db->prepare("SELECT * FROM item WHERE id=?");
                    $r2->execute(array($l['idItem']));
                    $linhas2 = $r2->fetchAll(PDO::FETCH_ASSOC);

                    foreach ($linhas2 as $l2) {
                        echo "
                            <p><strong>Descrição:</strong> " . $l2['descricao'] . "</p>
                            <p><strong>Quantidade:</strong> " . $l['qtItem'] . " | <strong>Valor Un:</strong> R$ " . number_format($l2['valor'], 2, ',', '') . " | <strong>Valor Tot:</strong> R$ " . $l['valorTotItem'] . "</p>
                            <br>
                        ";
                    }
                }
            ?>
            <br>
            <button class="btn btn-primary" onClick="window.print()">Imprimir</button>
        </div>
    </div>


</div>
</body>
</html>