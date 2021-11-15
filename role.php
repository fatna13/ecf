<?php

require_once('include/bdd.php');

// var_dump($_SESSION);

?>


<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>admin</title>

  <link rel="stylesheet" href="css/role.css">
  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="tables.css" rel="stylesheet">
  <link href="style-responsive.css" rel="stylesheet">
  <link rel="stylesheet" href="table-responsive.css">
  <script src="lib/chart-master/Chart.js"></script>


</head>
<body>
  <section id="main-content">
      <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i>Table </h3>
        <div class="row">
          <div class="col-md-12">
            <div class="content-panel">
              <h4><i class="fa fa-angle-right"></i> Réservations salles</h4>
              <h4><i class="fa fa-angle-right"></i><a href="deconnexion.php"> Déconnexion</a></h4>
              <hr>
            

                  <?php
                      if(isset($erreur)){
                          echo $erreur;
                      }

                    
                  ?>
              <button class="ajout"><a href='ajout.php'> + Ajouter une salle</a></button> 
              
              <table class="table">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Titre</th>
                    <th>Image</th>
                    <th>Prix</th>
                    <th>Début</th>
                    <th>Fin</th>
                    <th>Lieu</th>
                    <th>ID User</th>
                    <th> Modifier</th>
                    <th> Supprimer </th>
                  </tr>
                </thead>
                <tbody>
                  
                  
                  <?php 
                      $recup=$bdd->query("SELECT * FROM salle");
                      $reserv=$recup->fetchAll();
                      foreach($reserv as $reservation):
                  ?>
                      <tr>
                          <td><?= $reservation["idsalle"]?></td>
                          <td><?= $reservation["nameSalle"]?></td>
                          <td><img src="./upload/<?= $reservation["imageSalle"]?>" alt="b" width=70 height=70></td>
                          <td><?= $reservation["prixSalle"]?></td>
                          <td><?= $reservation["début"]?></td>
                          <td><?= $reservation["fin"]?></td>
                          <td><?= $reservation["lieuSalle"]?></td>
                          <td><?= $reservation["user_iduser"]?></td>
                          
                          
                          <td class="changement"><a href="modifier.php?id=<?= $reservation["idsalle"]?>">
                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="purple" class="bi bi-brush-fill" viewBox="0 0 16 16">
                          <path d="M15.825.12a.5.5 0 0 1 .132.584c-1.53 3.43-4.743 8.17-7.095 10.64a6.067 6.067 0 0 1-2.373 1.534c-.018.227-.06.538-.16.868-.201.659-.667 1.479-1.708 1.74a8.118 8.118 0 0 1-3.078.132 3.659 3.659 0 0 1-.562-.135 1.382 1.382 0 0 1-.466-.247.714.714 0 0 1-.204-.288.622.622 0 0 1 .004-.443c.095-.245.316-.38.461-.452.394-.197.625-.453.867-.826.095-.144.184-.297.287-.472l.117-.198c.151-.255.326-.54.546-.848.528-.739 1.201-.925 1.746-.896.126.007.243.025.348.048.062-.172.142-.38.238-.608.261-.619.658-1.419 1.187-2.069 2.176-2.67 6.18-6.206 9.117-8.104a.5.5 0 0 1 .596.04z"/>
                          </svg>
                          modifier</a></td>
                          <td class="changement"><a href="delete.php?id=<?= $reservation["idsalle"]?>">
                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                          <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                          </svg>
                          supprimer</a></td>

                      </tr>

                  <?php endforeach?>



                </tbody>
              </table>
            </div>
          </div>
          
        </div> 

      </section>
  </section>  
</body> 
</html>
