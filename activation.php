<?php
session_start();
include("db_manager.php");
try{
  $bdd = new PDO($servername.";dbname=".$dbname, $username, $password);
} catch(PDOException $e){
 die('Erreur:'.$e->getMessage());
}  

$login = $_GET['log'];
$cle = $_GET['cle'];
$reqactive = $bdd->prepare('SELECT user_validated, `user_ID` FROM user WHERE  `user_ID` = ? ');  
$reqactive->execute(array($cle)) && $row = $reqactive->fetch();
    $clebdd = $row['user_ID'];
    $actif = $row['user_validated']; 
 
if($actif == '1') 
  {
     echo "Votre compte est déjà actif !";
  }
else 
  {
     if($cle == $clebdd)	
       {
          $stmt = $bdd->prepare('UPDATE `user` SET user_validated = 1 WHERE `user_ID` = ? ');
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