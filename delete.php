<?php

    require_once('libraries/bdd.php');


   
    $id = $_GET["id"];
    
        $sup = $bdd->prepare("DELETE FROM salle WHERE idsalle = ?");
        $sup->execute([$id]);

        header("Location: role.php?msg=l'article a bien été supprimé");

?>    