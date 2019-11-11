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
//   $user_ID = 1;
//     $img_ID = 1;

if (isset($img_ID)){
    $req = $bdd->prepare('SELECT * FROM `img`WHERE `img_ID`= ?');
    $req->execute(array($img_ID));
    
    while ($donnees = $req->fetch()){
        echo $donnees['img_path']."\n";
    }
    $req->closeCursor();
}
else if (isset($user_ID)){
    $req = $bdd->prepare('SELECT * FROM `img`WHERE `user_ID`= ?');
    $req->execute(array($user_ID));
    
    while ($donnees = $req->fetch()){
        echo $donnees['img_path']."\n";
    }
    $req->closeCursor();
   
}
else {
    $req = $bdd->prepare('SELECT * FROM `img`');
    $req->execute(array());
    
    while ($donnees = $req->fetch()){
        echo $donnees['img_path']."\n";
    }
    $req->closeCursor();

}
