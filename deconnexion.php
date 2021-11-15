<?php
    session_start();
    $_SESSION = array();
    session_destroy();// On détruit la session : l'utilisateur n'est plus connecté !
    header("Location: connexion.php");
?>