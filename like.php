<?php
session_start();
include("db_manager.php");
try{
    $conn = new PDO($servername.";dbname=".$dbname, $username, $password);
}
catch(Exception $e){
	die('Erreur : '.$e->getMessage());
}
if ($_POST['submit'] && $_POST['submit'] == "OK")
{
    if (!isset($_SESSION['id'])){
    //METTRE LE BON LIEN
	header('Location:connexion.php');
	exit();
    }
    $user_ID = $_SESSION['id'];
    $img_ID = $_POST['image_ID'];
    $insertlike = $bdd->prepare("INSERT INTO user_action(`user_ID`, img_ID, user_action_like) VALUES(?,?,?)");
                              $insertmbr->execute(array($user_ID, $img_ID,1));  
}
?>
