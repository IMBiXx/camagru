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
function add_image($user_ID, $img_path) {
    $bdd = db_connect();
    $addlike = $bdd->prepare("INSERT INTO `img`(`user_ID`, `img_path`) VALUES(?,?)");
    $addlike->execute(array($user_ID, $img_path)); 
}