<?php 

session_start();


try{

   $bdd = new PDO("mysql:host=localhost; dbname=reservation; charset=utf8","root", "");
// Activation des erreurs PDO
   $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   
}catch(PDOException $e){

   echo $e->getMessage();
}


?>