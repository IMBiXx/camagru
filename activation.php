<?php
session_start();
try{
    $bdd = new PDO('mysql:host=localhost; dbname=camagru', 'wafa', 'root');
} catch(PDOException $e){
 die('Erreur:'.$e->getMessage());
}  

$login = $_GET['log'];
$cle = $_GET['cle'];
$reqactive = $bdd->prepare('SELECT user_validated, id FROM user WHERE  id = ? ');  
$reqactive->execute(array($cle)) && $row = $reqactive->fetch();
    $clebdd = $row['id'];
    $actif = $row['user_validated']; 
 
if($actif == '1') 
  {
     echo "Votre compte est déjà actif !";
  }
else 
  {
     if($cle == $clebdd)	
       {
          $stmt = $bdd->prepare('UPDATE `user` SET user_validated = 1 WHERE id = ? ');
          $stmt->bindParam(array($cle));
          $stmt->execute(array($cle));
          echo "Votre compte a bien été activé !";
       }
     else
       {
          echo "Erreur ! Votre compte ne peut être activé...";
       }
  }
?>