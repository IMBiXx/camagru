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
function add_comment($user_ID,$img_ID, $comment_comment) {
    $bdd = db_connect();
    $addlike = $bdd->prepare("INSERT INTO `comment`(`user_ID`, `img_ID`,`comment_comment`) VALUES(?,?,?)");
    $addlike->execute(array($user_ID, $img_ID, $comment_comment)); 
}
