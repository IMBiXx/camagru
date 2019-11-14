<?php
function add_comment($user_ID,$img_ID, $comment_comment) {
    $bdd = db_connect();
    $addcomment = $bdd->prepare("INSERT INTO `comment`(`user_ID`, `img_ID`,`comment_comment`) VALUES(?,?,?)");
    $addcomment->execute(array($user_ID, $img_ID, $comment_comment)); 
}
?>