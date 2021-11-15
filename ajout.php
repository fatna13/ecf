<?php

require_once('include/bdd.php');

$idUser = $_SESSION['id']; 
// var_dump($idUser);
// var_dump($_SESSION);



if(isset($_POST["submit"])){

    // var_dump($_FILES);

    if(!empty($_POST["titre"]) && !empty($_FILES["image"]) && !empty($_POST["prix"])&& !empty($_POST["first"])&& !empty($_POST["last"])&& !empty($_POST["lieu"])){
        // move_upload pour telecharger mon image, tmp_name vu dans var-dump
        // $_FILES.... DANS var-dump je met les titres dans un tableau
        // rajouter dans mon formulaire enctype="multipart/form-data
        move_uploaded_file($_FILES['image'] ['tmp_name'], './upload/'.$_FILES['image'] ['name']);

        $insert = $bdd->prepare("INSERT INTO salle(nameSalle, imageSalle, prixSalle, début, fin, lieuSalle, user_iduser) VALUES(?, ?, ?, ?, ?, ?, ?)");

        $insert->execute([ $_POST["titre"], $_FILES['image'] ['name'], $_POST["prix"], $_POST["first"], $_POST["last"], $_POST["lieu"], $idUser]);

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
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout</title>
</head>
<body>
    
    <h2>Ajouter une salle</h2>

        <form action="" method="POST"  enctype="multipart/form-data" >
            <input type="text" placeholder="ajouter le nom de la salle" name="titre">
            <input type="file" placeholder="ajouter une image" name="image">
            <input type="text" placeholder="ajouter le prix" name="prix">
            <input type="text" placeholder="ajouter le début" name="first">
            <input type="text" placeholder="ajouter la fin" name="last">
            <input type="text" placeholder="ajouter le lieu" name="lieu">
            <input type="submit" name="submit">
        </form> 

    <?php
        if(isset($erreur)){
            echo $erreur;
        }

               
    ?>


</body>
</html>
