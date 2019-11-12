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


function get_user_by_ID($user_ID) {
    $bdd = db_connect();
    $rep = array();
    $req = $bdd->prepare('SELECT * FROM `user`WHERE `user_ID`= ?');
    $req->execute(array($user_ID));
    
    while ($donnees = $req->fetch()){
        $rep = $donnees;
    }
    $req->closeCursor();
    return ($rep);
}

print_r(get_user_by_ID(3));
echo"get_ready";