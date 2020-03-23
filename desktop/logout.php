<?php
session_start();
unset($_SESSION['nomeLogin']);
unset($_SESSION['senhaLogin']);
session_destroy();
header("location: index.php");
?>