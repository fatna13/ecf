<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Room reservation</title>
    <link rel="stylesheet" href="salle.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!-- police -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
    <!-- icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>


    <div class="entete" id="header">
       
            <img src="image/logo2.png" alt="logo" class="logo">
        
            <a href="index.php">Accueil</a>
            <a href="index.php">A propos de nous</a>
            <a href="contact.php">Contact</a>
            <a href="connexion.php">Espace client</a>
    </div>

    <section class="one">
        <h1> La meilleure salle pour vous retrouver et travailler en toute tranquilité </h1>
        <div class="filter">
            <form action="" method="post" class="contenu">
                <div class="box-2">
                    <label for="nombre">Nombre de Personnes</label>
                    <input type="text" name="nombre" placeholder="Sélectionner">
                </div>
                <div class="box-3">
                    <label for="localisation">Localisation</label>
                    <input type="text" name="localisation" placeholder="Ville, adresse" class="input-2" autocomplete="off">
                </div>
                <button type="submit" class="input-one"> <i class="fa fa-search"></i> </button>
            </form>
        </div>
    </section>

    
    <div class="second">
        <!-- <div class="message"> -->
            <h1>Bienvenue</h1>
            <div class="line"></div>
            <p>Vous recherchez un lieu pour vous réunir? <strong>Room'13</strong>  est là pour vous satisfaire. Notre équipe mettra toute son expertise pour vous trouver l'endroit idéal pour organiser au mieux vos rencontres.
            Venez découvrir nos lieux convivial, originaux, et apaisant.
            Toutes les salles de réunions sont entièrement équipées de technologies de qualité et de mobilier moderne et confortable.
            </p>
            <button><a href="contact.php">Contactez-nous</a></button> 
        <!-- </div> -->
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
<!-- <script src="salle.js"></script> -->
</body>
</html>