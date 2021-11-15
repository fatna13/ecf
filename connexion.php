<?php

 require_once('include/bdd.php');


 // Si le formulaire a été validé
if(isset($_POST['connexion'])) {
    //htmlspecialchars= Convertit les caractères spéciaux en entités HTML
    $mail = htmlspecialchars($_POST['emailConnect']);
    $mdp = $_POST['mdpConnect'];
   

    if(!empty($mail) AND !empty($mdp)) {

        // on déclenche une requete de récupération basée sur l'email
        $reqUser = $bdd->prepare("SELECT * FROM user WHERE emailUser = ?");
        $reqUser->execute([$mail]);
        // rowCount — Retourne le nombre de lignes affectées par le dernier appel à la fonction PDOStatement::execute()
        $userExist = $reqUser->rowCount();
      
        //  var_dump($mail,$mdp);
        // var_dump($userExist);

        if($userExist == 1) {
            // fetch — Récupère la ligne suivante d'un jeu de résultats PDO
            $userInfo = $reqUser->fetch();
            // var_dump($userInfo);
                $_SESSION['id'] = $userInfo['idUser'];
                $_SESSION['pseudo'] = $userInfo['nameUser'];
                $_SESSION['email'] = $userInfo['emailUser'];
          
            // password_verify — Vérifie qu'un mot de passe correspond à un hachage
            if(password_verify($mdp, $userInfo['mdpUser'])){                
                if($userInfo['roleUser']==1){  
                    header("Location: role.php");
                 }else{
                    header("Location: profil.php?id=".$_SESSION['id']);
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
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="css/connexion.css">
</head>
<body>

    <?php require_once('include/header.php');?>


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

    <?php require_once('include/footer.php');?>

</body>
</html>