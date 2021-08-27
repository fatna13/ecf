<?php

require_once('libraries/bdd.php');

$idUser = $_SESSION['id']; 
var_dump($idUser);
// var_dump($_SESSION);

if(isset($_POST["submit"])){
    
if(!empty($_POST["titre"]) && !empty($_POST["image"]) && !empty($_POST["prix"])&& !empty($_POST["date"])&& !empty($_POST["heure"])&& !empty($_POST["lieu"])){
    

    $insert = $bdd->prepare("INSERT INTO salle(nameSalle, imageSalle, prixSalle, dateSalle, heureSalle, lieuSalle, user_iduser) VALUES(?, ?, ?, ?, ?, ?, ?)");

    $insert->execute([ $_POST["titre"], $_POST["image"], $_POST["prix"], $_POST["date"], $_POST["heure"], $_POST["lieu"], $idUser]);

    header("Location: role.php");
    

}else{
    $erreur = "<p class='error'> Veuillez remplir les champs ! </p>";
}

}


$select = $bdd->prepare("SELECT * FROM salle");
$select->execute();

$resultat = $select->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout</title>
</head>
<body>
    
    <h2>Ajouter une salle</h2>

        <form action="" method="POST">
            <input type="text" placeholder="ajouter le nom de la salle" name="titre">
            <input type="file" placeholder="ajouter une image" name="image">
            <input type="text" placeholder="ajouter le prix" name="prix">
            <input type="text" placeholder="ajouter une date" name="date">
            <input type="text" placeholder="ajouter l'heure" name="heure">
            <input type="text" placeholder="ajouter le lieu" name="lieu">
            <input type="submit" name="submit">
        </form> 

    <?php
        if(isset($erreur)){
            echo $erreur;
        }

               
    ?>
