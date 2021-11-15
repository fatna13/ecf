<?php

require_once('include/bdd.php');
 
if(isset($_SESSION['id'])) {
   $requser = $bdd->prepare("SELECT * FROM user WHERE idUser = ?");
   $requser->execute(array($_SESSION['id']));
   $user = $requser->fetch();
   if(isset($_POST['nom']) AND !empty($_POST['nom']) AND $_POST['nom'] != $user['nameUser']) {
      $newpseudo = htmlspecialchars($_POST['nom']);
      $insertpseudo = $bdd->prepare("UPDATE user SET nameUser = ? WHERE idUser = ?");
      $insertpseudo->execute(array($newpseudo, $_SESSION['id']));
      header('Location: profil.php?id='.$_SESSION['id']);
   }

   if(isset($_POST['email']) AND !empty($_POST['email']) AND $_POST['email'] != $user['emailUser']) {
      $newmail = htmlspecialchars($_POST['email']);
      $insertmail = $bdd->prepare("UPDATE user SET emailUser = ? WHERE idUser = ?");
      $insertmail->execute(array($newmail, $_SESSION['id']));
      header('Location: profil.php?id='.$_SESSION['id']);
   }
   
   
?>
<html lang="fr">
   <head>
      <title>ModifProfil</title>
      <meta charset="utf-8">
   </head>
   <body>

      <?php require_once('include/header.php');?>

      <div >
         <h2>Modifier mon profil</h2>
         <div >
            <form method="POST" action="" >
               <label>Nom :</label>
               <input type="text" name="nom" placeholder="Nom" value="<?php echo $user['nameUser']; ?>" /><br /><br />
               <label>Mail :</label>
               <input type="text" name="email" placeholder="email" value="<?php echo $user['emailUser']; ?>" /><br /><br />
               
               <input type="submit" value="Mettre à jour mon profil !" />
               
            </form>
            <?php if(isset($msg)) { echo $msg; } ?>
         </div>
      </div>
      
      <?php require_once('include/footer.php');?>
   </body>
</html>
<?php   
}
else {
   header("Location: connexion.php");
}
?>