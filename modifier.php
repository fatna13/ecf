<?php

require_once('include/bdd.php');

    
    
if(isset($_SESSION['id'])) {
    $reqSalle = $bdd->prepare("SELECT * FROM salle WHERE idsalle = ?");
    $reqSalle->execute(array($_SESSION['id']));
    $salle = $reqSalle->fetch();

    var_dump($salle);

    if(isset($_POST['submit'])){
        $titre = $_POST["titre"];
        $image = $_POST["image"];
        $prix = $_POST["prix"];
        $first = $_POST["first"];
        $last = $_POST["last"];
        $lieu = $_POST["lieu"];
        $id = $_GET["id"];
       


        if(!empty($titre) &&!empty($image) &&!empty($prix) &&!empty($first) &&!empty($last) &&!empty($lieu) ){

            $modifier = $bdd->prepare("UPDATE salle SET nameSalle = ?, imageSalle = ?, prixSalle = ?, début = ?, fin = ?, lieuSalle = ?  WHERE idsalle = ?");
            $modifier->execute([$titre,$image,$prix,$first,$last,$lieu,$id]);

            header("Location: role.php?msg=la salle a bien été modifié");
        }
        }else if(isset($_GET['id'])) {
                $reqSalle = $bdd->prepare("SELECT * FROM salle WHERE idsalle = ?");
                $reqSalle->execute(array($_GET['id']));
                $salle = $reqSalle->fetch();
            }

        }else{
            $erreur = "veuillez remplir les champs !";
        }
    
       
    
    
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>modifier</title>
    <link rel="stylesheet" href="css/modifier.css">
</head>
<body>

    <?php require_once('include/header.php');?>

    <div class="oneLine">
        <p ><a href="role.php">Tableau de bord ></a><span class="span"> Modifier > </span></p>
    </div>

    <?php 
        if(isset($erreur)){
            echo "<p style='color:red'>". $erreur . '</p>';
        }
    
    ?>


        <form action="" method="POST">
            <input type="text" placeholder="modifier le nom de la salle" name="titre" value="<?php echo $salle['nameSalle']; ?>"/>
            <input type="file" placeholder="modifier une image" name="image" value="<?php echo $salle['imageSalle']; ?>"/>
            <input type="text" placeholder="modifier le prix" name="prix" value="<?php echo $salle['prixSalle']; ?>"/>
            <input type="text" placeholder="modifier le début" name="first" value="<?php echo $salle['début']; ?>"/>
            <input type="text" placeholder="modifier la fin" name="last" value="<?php echo $salle['fin']; ?>"/>
            <input type="text" placeholder="modifier le lieu" name="lieu" value="<?php echo $salle['lieuSalle']; ?>"/>
            <input type="submit" name="submit">
        </form> 

    <?php require_once('include/footer.php');?>

</body>
</html>
