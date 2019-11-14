<?php

if ($_POST['submit'] && $_POST['submit'] == "OK")
{
    if (!isset($_SESSION['id'])){
	    header('Location:connexion.php');
	    exit();
    }
$user_ID = $_SESSION['id'];
$img_ID = $_POST['image_ID'];
    // $user_ID = 1;
    // $img_ID = 1;
$deletelike = $bdd->prepare("DELETE FROM `liked` WHERE `user_ID`= ? AND `img_ID`= ?");
$deletelike->execute(array($user_ID, $img_ID));  

$deletecontent = $bdd->prepare("DELETE FROM `img` WHERE `user_ID`= ? AND `img_ID`= ?");
$deletecontent->execute(array($user_ID, $img_ID));  

$deleteimg = $bdd->prepare("DELETE FROM `content` WHERE `user_ID`= ? AND `img_ID`= ?");
$deleteimg->execute(array($user_ID, $img_ID));  
}
?>