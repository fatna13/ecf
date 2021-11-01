<?php

 require_once('libraries/bdd.php');


 
if(isset($_POST['connexion'])) {
    $mail = htmlspecialchars($_POST['emailConnect']);
    $mdp = $_POST['mdpConnect'];
   

    if(!empty($mail) AND !empty($mdp)) {

      
      $reqUser = $bdd->prepare("SELECT * FROM user WHERE emailUser = ?");
      $reqUser->execute([$mail]);
      $userExist = $reqUser->rowCount();
      
        //  var_dump($mail,$mdp);
      var_dump($userExist);


        if($userExist == 1) {
        
            $userInfo = $reqUser->fetch();
            // var_dump($userInfo);
              $_SESSION['id'] = $userInfo['idUser'];
              $_SESSION['pseudo'] = $userInfo['nameUser'];
               $_SESSION['email'] = $userInfo['emailUser'];
          
           if(password_verify($mdp, $userInfo['mdpUser']))
            
                {  
                              
                if($userInfo['roleUser']==1){
                 
                        
                    header("Location: role.php");

                 }else{
                    header("Location: profil.php?id=".$_SESSION['id']);
                        // die($userInfo['roleUser']);
               
                 }
            } else {
                $erreur = "Mauvais mail ou mot de passe !";
            }


        } else {
            $erreur = "Tous les champs doivent être complétés !";
        }
    }
}

   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="connexion.css">
</head>
<body>

    <div class="entete" id="header">
        
        <img src="image/logo2.png" alt="logo" class="logo">
    
        <a href="index.php">Accueil</a>
        <a href="index.php">A propos de nous</a>
        <a href="contact.php">Contact</a>
        <a href="connexion.php">Espace client</a>
    </div>

    <div class="container">
        <h1>Connexion</h1>
        <form  class="connexion" action="" method="POST">
            <p>Bienvenue</p>
            <input type="email" name="emailConnect" placeholder="Email" ><br>
            <input type="password" name="mdpConnect" placeholder="Mot de passe"><br>
            <input type="submit" value="Connexion" name="connexion"><br>
            <!-- <a href="recuperation.php">Mot de passe oublié</a> -->
            <a href="inscription.php">Pas encore inscrit ? S'inscrire !</a>

        </form>
    </div>

    <?php

        if(isset($erreur)) {
            echo $erreur;
        }
    ?>

<footer>
        <div class="footer-bloc">
                <div class="picture">
                    <a href="#"><img src="image/logo2.png" alt="logo_footer" class="logo"></a>
                </div>
                <div class="a-propos">
                    <div class="par2">
                        <ul>À propos de nous
                            <li><a href="#">Qui sommes nous</a></li>
                            <li><a href="#">Nous contacter</a></li>
                        </ul>
                    </div>
                </div>
        
                    
            <div class="conteneur7">
                <div class="mentions">
                    <p><a href="#">Mentions légales</a></p>
                </div>
                <div class="mentions">
                    <p><a href="#">Politique de confidentialité</a></p>
                </div>
               
            </div>
            
        </div>
</footer>

</body>
</html>