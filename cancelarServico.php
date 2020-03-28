<?php
    require_once 'conect.php';

    $r = $db->query("SELECT id FROM ordem WHERE aberta=1");
    $linhas = $r->fetchAll(PDO::FETCH_ASSOC);
    foreach($linhas as $l) {$idAberta = $l['id'];}

    $r = $db->prepare("DELETE FROM itemOrdem WHERE idOrdem=?");
    $r->execute(array($idAberta));

    $r = $db->exec("DELETE FROM ordem WHERE aberta=1");
    header("location: painel.php");

?>