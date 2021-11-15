<?php

require_once('include/bdd.php');



if(isset($_POST['inscription'])) {
    $pseudo = htmlspecialchars($_POST['pseudo']);
    $mail = htmlspecialchars($_POST['mail']);
    // $surname = htmlspecialchars($_POST['']);
    


     $mdp = $_POST['mdp'];
     $mdp2 =$_POST['confirmPassword'];

    if(!empty($pseudo) AND !empty($mail) AND !empty($mdp) AND !empty($mdp2)) {
   
    //  strlen retourne la longueur d'une chaîne de caractères, c'est-à-dire le nombre de lettres et de chiffres dont elle est constituée (espaces compris) 
    $pseudolength = strlen($pseudo);
      if($pseudolength <= 255) {
        
            $reqPseudo = $bdd->prepare("SELECT * FROM user WHERE nameUser = ?");
            $reqPseudo->execute([$pseudo]);
            $pseudoExist = $reqPseudo->rowCount();

                      

            if($pseudoExist === 0){

                if(filter_var($mail, FILTER_VALIDATE_EMAIL)){

                    $reqEmail = $bdd->prepare("SELECT * FROM user WHERE emailUser = ?");
                    $reqEmail->execute([$mail]);
                    $mailExist = $reqEmail->rowCount();

                    if($mailExist === 0){

                       
                        if($mdp === $mdp2){
                            $mdp = password_hash($_POST['mdp'], PASSWORD_DEFAULT);
                            $mdp2 = password_hash($_POST['confirmPassword'], PASSWORD_DEFAULT);

                            $insertMembre = $bdd->prepare("INSERT INTO user (nameUser, emailUser, mdpUser, roleUser) VALUES (?,?,?,?)");
                            $insertMembre->execute(array($pseudo,$mail,$mdp,2));
                            
                            header("Location: connexion.php");
                            // $erreur = "Votre compte a bien été crée !";
                   
                        }else {
                            echo "Pseudo ou Password incorrect"; // Si l'un des deux ou les deux ne sont pas correct (var_par defaut ou bdd)
                        }
                        }else{
                            $erreur = "Les mots de passe ne correspondent pas.";
                        }

                    }else{
                        $erreur = "Cet email est déjà utilisé.";
                    }

                }else{
                    $erreur = "Votre email n'est pas valide.";
                }

            }else{
                $erreur = "Le pseudo est déjà utilisé.";
            }

        }else{
            $erreur = "Votre pseudo est trop grand.";
        }

    }else{
        $erreur = "Veuillez remplir tous les champs.";
    }

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="css/inscription.css">
</head>
<body>

    <!-- inclusion de l'entête  -->
    <?php require_once('include/header.php');?> 


    <div class="container">
        <h1>Inscription</h1>      
        <form  class="inscription" action="" method="POST">
            <h3>Bienvenue</h3>
            <input type="pseudo" name="pseudo" placeholder="Pseudo" ><br>
            <input type="email" name="mail" placeholder="Email" ><br>
            <input type="password" name="mdp" placeholder="Mot de passe"><br>
            <input type="password" name="confirmPassword" placeholder="Confirme mdp"><br>
            <input type="submit" value="S'inscrire" name="inscription"><br>  
        </form>
    </div>

    <?php
         if(isset($erreur)) {
            echo '<font color="black" p-3>'.$erreur.'</font>';
         }
    ?>

<!-- inclusion du bas de page du site  -->

<?php require_once('include/footer.php');?>

</body>
</html>