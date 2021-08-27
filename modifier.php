<?php

require_once('libraries/bdd.php');

    
    
    if(isset($_POST['submit'])){

        $titre = $_POST["titre"];
        $image = $_POST["image"];
        $prix = $_POST["prix"];
        $date = $_POST["date"];
        $heure = $_POST["heure"];
        $lieu = $_POST["lieu"];
        $id = $_GET["id"];
       


        if(!empty($titre) &&!empty($image) &&!empty($prix) &&!empty($date) &&!empty($heure) &&!empty($lieu) ){

            $modifier = $bdd->prepare("UPDATE salle SET nameSalle = ?, imageSalle = ?, prixSalle = ?, dateSalle = ?, heureSalle = ?, lieuSalle = ?  WHERE idsalle = ?");
            $modifier->execute([$titre,$image,$prix,$date,$heure,$lieu,$id]);

             header("Location: role.php?msg=l'article a bien été modifié");

        }else{
            $erreur = "veuillez remplir les champs !";
        }


    }
    
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>modifier</title>
</head>
<body>
    <?php 
        if(isset($erreur)){
            echo "<p style='color:red'>". $erreur . '</p>';
        }
    
    ?>


<form action="" method="POST">
            <input type="text" placeholder="modifier le nom de la salle" name="titre">
            <input type="file" placeholder="modifier une image" name="image">
            <input type="text" placeholder="modifier le prix" name="prix">
            <input type="text" placeholder="modifier une date" name="date">
            <input type="text" placeholder="modifier l'heure" name="heure">
            <input type="text" placeholder="modifier le lieu" name="lieu">
            <input type="submit" name="submit">
        </form> 

    

</body>
</html>
