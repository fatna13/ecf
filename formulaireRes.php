<?php 
    require_once('include/bdd.php');
    
   function affichesalle($bdd){
       $sql = $bdd->prepare("SELECT * FROM `salle` WHERE idsalle=?");
       $salle=$bdd->query($sql);
       return $salle->fetchAll(PDO::FETCH_ASSOC);   
   }
   $salle=affichesalle($bdd);

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href=""/>
    <title>Réserver une salle</title>
</head>
<body>
    
    <?php require_once('include/header.php');?>

    <main>
        <h1>Réserver une salle</h1>
        <form action="formulaireRes.php" method="POST" class="form_pir">
            <label for="titre">Titre <span class="oblig">*</span> :</label>
            <select id="titre" name="titre" required>
                <option value="Happy">Happy</option>
                <option value="zen">zen</option>
                <option value="play">play</option>
                <option value="spacieuse">spacieuse</option>
                <option value="serenite">Sérénité</option>
                               
            </select>                

            <label for="description">Description <span class="oblig">*</span>: </label>
            <input type="text" id="description" name="description" value="<?=$salle['description']?>" required>

        
           
            <label for="debut">Date et heure de début <span class="oblig">*</span> :</label>
            <input type="date" id="date" name="date-debut" required>  


            <label for="fin">Date et heure de fin <span class="oblig">*</span> :</label>
            <input type="date" id="fin" name="fin" required>
                
            <small class="oblig">* Champ obligatoire</small>        
           
            <input type="submit" name="validresa" class="bouton" value="Réserver">

            <?php
                if(isset($msg_error))
                    {
                        echo "<span class='msg_'>" . $msg_error . "</span><br/>";
                    }
                if(isset($msg_valid))
                    {
                        echo "<span class='msg_'>" . $msg_valid . "</span><br/>";
                    }
            ?>
        </form>
    </main>

    <?php require_once('include/footer.php');?>
   
</body>
</html>