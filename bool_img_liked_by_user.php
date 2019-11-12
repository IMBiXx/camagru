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

function bool_img_liked_by_user($user_ID,$img_ID) {
    $bdd = db_connect();
    $req_img = $bdd->prepare("SELECT * FROM `liked` WHERE `user_ID`= ? AND `img_ID`= ?");
    $req_img->execute(array($user_ID, $img_ID)); 
    $img_liked = $req_img->rowCount();
    if($img_liked == 0){
    return(0);
    }
    else 
    return(1);
}

?>