<?php
include("db_manager.php");
try{
    $bdd = new PDO($servername.";dbname=".$dbname, $username, $password);
}
catch(Exception $e){
	die('Erreur : '.$e->getMessage());
}
$img_ID = $_POST['img_ID'];
$user_ID = $_POST['user_ID'];


if (isset($img_ID)){
    $req = $bdd->prepare('SELECT * FROM `comment`WHERE `img_ID`= ?');
    $req->execute(array($img_ID));
    $rep= array();
    while ($donnees = $req->fetch()){
        $rep[]=$donnees;
    }
    $req->closeCursor();
}
else if (isset($user_ID)){
    $req = $bdd->prepare('SELECT * FROM `comment`WHERE `user_ID`= ?');
    $req->execute(array($user_ID));
    
    while ($donnees = $req->fetch()){
        echo $donnees['comment_comment']."\n";
    }
    $req->closeCursor();
   
}