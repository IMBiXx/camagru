<?php
include ("db_connect.php");
function add_comment($user_ID,$img_ID, $comment_comment) {
    $bdd = db_connect();
    $addlike = $bdd->prepare("INSERT INTO `comment`(`user_ID`, `img_ID`,`comment_comment`) VALUES(?,?,?)");
    $addlike->execute(array($user_ID, $img_ID, $comment_comment)); 
}
