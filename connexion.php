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
              $_SESSION['id'] = $userInfo['iduser'];
              $_SESSION['pseudo'] = $userInfo['nameUser'];
               $_SESSION['email'] = $userInfo['emailUser'];
          
           if(password_verify($mdp, $userInfo['mdpUser']))
            
                {  
                              
                if($userInfo['roleUser']==1){
                 
                        
                    header("Location: role.php");

                 }else{
                    header("Location: profil.php?id=".$_SESSION['iduser']);
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
    <title>Document</title>
    <link rel="stylesheet" href="connexion.css">
</head>
<body>



    <div class="entete" id="header">
        
        <a href="index.php">Accueil</a>
        <a href="inscription.php">Inscription</a>
        <a href="#">Connexion</a>
        
    </div>

    <div class="container">
        
    
                
        <form  action="" method="POST">
            <p>Bienvenue</p>
            <input type="email" name="emailConnect" placeholder="Email" ><br>
            <input type="password" name="mdpConnect" placeholder="Mot de passe"><br>
            <input type="submit" value="Connexion" name="connexion"><br>
            <a href="recuperation.php">Mot de passe oublié</a>
        </form>

            <!-- shadow -->
        <div class="drop drop-1"></div>
        <div class="drop drop-2"></div>
        <div class="drop drop-3"></div>
        <div class="drop drop-4"></div>
        <div class="drop drop-5"></div>
    </div>

    <?php

        

         if(isset($erreur)) {
            echo $erreur;
         }
    ?>

</body>
</html>