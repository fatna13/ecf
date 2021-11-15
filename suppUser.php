<?php

    require_once('include/bdd.php');


   
    $id = $_GET["id"];
    
        $sup = $bdd->prepare("DELETE FROM user WHERE idUser = ?");
        $sup->execute([$id]);
        // var_dump($id);
        header("Location: connexion.php?msg=Votre compte a bien été supprimé");

?>   