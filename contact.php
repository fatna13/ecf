<?php

 require_once('libraries/bdd.php');

if(isset($_POST['submit']))
{
    if(!empty($_POST['firstname']) AND !empty($_POST['sujet']) AND !empty($_POST['email']) AND !empty($_POST['message']))
	{
		$header="MIME-Version: 1.0\r\n";
		$header.='From:"VOTRE NOM"<email-expediteur@example.org>'."\n";
		$header.='Content-Type:text/html; charset="uft-8"'."\n";
		$header.='Content-Transfer-Encoding: 8bit';

		$message='
		<html>
			<body>
				<div align="center">
					<u>Nom de l\'expéditeur :</u>'.$_POST['firstname'].'<br />
					<u>Mail de l\'expéditeur :</u>'.$_POST['email'].'<br />
					<br />
					'.nl2br($_POST['message']).'
				</div>
			</body>
		</html>
		';

		mail("fatnabel13090@gmail.com", "CONTACT - Room'13.com", $message, $header);
		$msg="Votre message a bien été envoyé !";
	}
	else
	{
		$msg="Tous les champs doivent être complétés !";
	}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link rel="stylesheet" href="contact.css">
</head>

<body>

    <div class="entete" id="header">    
        
        <img src="image/logo2.png" alt="logo" class="logo">
    
        <a href="index.php">Accueil</a>
        <a href="index.php">A propos de nous</a>
        <a href="index.php">Contact</a>
        <a href="connexion.php">Espace client</a>
    </div>

    <div class="middle">
        <div class="contact">
            <h1>Room'13</h1>
            <p>2 Rue du chateau de l'horloge</p>
            <p>13090 Aix en provence</p>
            <p>06.89.52.89.58</p>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2892.7787218533454!2d5.414389215493675!3d43.52780687912578!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12c98d6ac411cc53%3A0x80e6bf2dceefef46!2s2%20Rue%20Ch%C3%A2teau%20de%20l&#39;Horloge%2C%2013090%20Aix-en-Provence!5e0!3m2!1sfr!2sfr!4v1635851887566!5m2!1sfr!2sfr" width="400" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>

        <div class="form">
            <h1>Formulaire de contact</h1>
        
            <form action="" method="POST">
                <!-- <label for="fname">Nom & prénom</label> -->
                <input type="text" id="fname" name="firstname" placeholder="Votre nom et prénom" value="<?php if(isset($_POST['firstname'])) { echo $_POST['firstname']; } ?>" >

                <!-- <label for="sujet">Sujet</label> -->
                <input type="text" id="sujet" name="sujet" placeholder="L'objet de votre message" value="<?php if(isset($_POST['sujet'])) { echo $_POST['sujet']; }?>" >

                <!-- <label for="emailAddress">Email</label> -->
                <input id="emailAddress" type="email" name="email" placeholder="Votre email" value="<?php if(isset($_POST['email'])) { echo $_POST['email']; } ?>">


                <!-- <label for="subject">Message</label> -->
                <textarea id="message" name="message" placeholder="Votre message" style="height:200px" value="<?php if(isset($_POST['message'])) { echo $_POST['message']; } ?>"></textarea>

                <input type="submit" value="Envoyer" name="submit">
            </form>
            <?php
                if(isset($msg))
                {
                    echo $msg;
                }
		    ?>

        </div>
        

    

    </div>
</div>

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