<?php

require_once('libraries/bdd.php');

//  var_dump($_SESSION);

 if(isset($_GET['id']) AND $_GET['id'] > 0) {
    // intvall:pour securiser la variable
    $getid = intval($_GET['id']);
    $requser = $bdd->prepare('SELECT * FROM user WHERE idUser = ?');
    $requser->execute(array($getid));
    $userinfo = $requser->fetch();

 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
    <link rel="stylesheet" href="profil.css">
</head>
<body>
    
    <div class="entete" id="header">
        
        <img src="image/logo2.png" alt="logo" class="logo">
        
        <a href="index.php">Accueil</a>
        <a href="index.php">A propos de nous</a>
        <a href="contact.php">Contact</a>
        <a href="connexion.php">Espace client</a>
        
    </div>
<section>
    <div class="central">
    <p class="oneLine">Tableau de bord > <span class="span"> Mon profil</span></p>
        <!-- <div class="container"> -->
           

            <div class="bloc_espace">
                <div class="info">
                    <h3>Informations personnelles</h3>
                    <p>Nom : <?php echo $userinfo['nameUser']; ?></p>
                    <p>Email : <?php echo $userinfo['emailUser']; ?></p>
                    <a href="editionprofil.php">Modifier</a>
                </div>
               
                <div class="info">
                <a href="#">Mes réservations</a>
                
                </div>
                
            </div>
        <!-- </div> -->
    </div>

    
</section>

   
     
</body>


</html>
 <?php   
}
?>