<?php
include("db_manager.php");
try{
    $bdd = new PDO($servername.";dbname=".$dbname, $username, $password);
}
catch(Exception $e){
	die('Erreur : '.$e->getMessage());
}
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
    $req_img = $bdd->prepare("SELECT * FROM `liked` WHERE `user_ID`= ? AND `img_ID`= ?");
    $req_img->execute(array($user_ID, $img_ID)); 
    $img_liked = $req_img->rowCount();
    if($img_liked == 0){
        $insertlike = $bdd->prepare("INSERT INTO `liked`(`user_ID`, img_ID) VALUES(?,?)");
        $insertlike->execute(array($user_ID, $img_ID));  
    }
    else{
        $deletelike = $bdd->prepare("DELETE FROM `liked` WHERE `user_ID`= ? AND `img_ID`= ?");
        $deletelike->execute(array($user_ID, $img_ID));  
    }
}
?>