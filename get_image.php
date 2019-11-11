<?php
function db_connect(){
    include("db_manager.php");
    try {
        $bdd = new PDO($servername.";dbname=".$dbname, $username, $password);
    }
    catch(Exception $e){
        die('Erreur : '.$e->getMessage());
    }
    return $bdd;
}
// $img_ID = $_POST['img_ID'];
// $user_ID = $_POST['user_ID'];
//   $user_ID = 1;
//     $img_ID = 1;
$rep = array();
function get_image_by_ID($img_ID) {
    $bdd = db_connect();
    $req = $bdd->prepare('SELECT * FROM `img`WHERE `img_ID`= ?');
    $req->execute(array($img_ID));
    
    while ($donnees = $req->fetch()){
        $rep[] = $donnees;
    }
    $req->closeCursor();
    return array_reverse($rep);
}
function get_image_by_user_ID($user_ID) {
    $bdd = db_connect();
    $req = $bdd->prepare('SELECT * FROM `img`WHERE `user_ID`= ?');
    $req->execute(array($user_ID));
    
    while ($donnees = $req->fetch()){
        $rep[] = $donnees;
    }
    $req->closeCursor();
    return array_reverse($rep);
}
function get_images() {
    $bdd = db_connect();
    $req = $bdd->prepare('SELECT * FROM `img`');
    $req->execute(array());
    
    while ($donnees = $req->fetch()){
        $rep[] = $donnees;
    }
    $req->closeCursor();
    return array_reverse($rep);
}
