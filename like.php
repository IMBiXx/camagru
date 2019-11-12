<?php
include ("db_connect.php");
    if (!isset($_SESSION['id'])){
	    header('Location: login.php');
	    exit();
    }
    $user_ID = $_SESSION['id'];
    $img_ID = $_POST['image_ID'];
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
?>