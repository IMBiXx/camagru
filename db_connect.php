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
?>