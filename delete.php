<?php

    require_once('libraries/bdd.php');


   
    $id = $_GET["id"];
    
        $sup = $bdd->prepare("DELETE FROM salle WHERE idsalle = ?");
        $sup->execute([$id]);

        header("Location: role.php?msg=la salle a bien été supprimé");

?>    