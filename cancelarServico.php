<?php
    require_once 'conect.php';

    $r = $db->exec("DELETE FROM ordem WHERE aberta=1");
    header("location: painel.php");