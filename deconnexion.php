<?php
    session_start();
    $_SESSION = array();
    // mettre fin au système de sessions
    session_destroy();
    header("Location: connexion.php");
?>