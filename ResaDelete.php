<?php

    require_once('include/bdd.php');


    if(isset($_GET['id']) && !empty($_GET['id'])){
        $id = $_GET['id'];

        $recup = $bdd->prepare("SELECT * FROM user AS u INNER JOIN salle AS s ON u.idUser = s.idsalle");
        $recup->execute(array($id));
    
    
        $sup = $bdd->prepare("DELETE FROM salle WHERE user_iduser = ?");
        $sup->execute([$id]);

        
    }
    header("Location: profil.php?msg=la salle a bien été supprimé");
?>    