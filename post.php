<?php
session_start();
date_default_timezone_set('europe/paris');
include("db_manager.php");
    try{
            $bdd = new PDO($servername.";dbname=".$dbname, $username, $password);
        } catch(PDOException $e){
            die('Erreur:'.$e->getMessage());
        }
    $id = $_SESSION['id'];
    if (!isset($_POST['image']) && !isset($_POST['poster_img']))
        $iurl = 'images/user_images/default_image.png';
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        echo $_POST['poster_img'];
        $uploaddir = './images/user_images/';
        $uploadfile = $uploaddir . basename($_FILES['image']['name']);
        if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)) {
            $iurl = $uploadfile;
            $_SESSION['iurl'] = $uploadfile;  
        }
        if (isset($_POST['poster_img']))
        {
            echo 'ulr: '.$_SESSION['iurl'];
            $img_uploade_date = date("Y-m-d H:i:s");
            $req = $bdd->prepare('INSERT INTO `img`(`user_ID`, `img_name`, `img_upload_date`, `img_path`) VALUES(?,?,?,?)');
            $req->execute(array($id, "default", $img_uploade_date, $_SESSION['iurl']));
            $iurl = $_SESSION['iurl'];
            $req = $bdd->prepare('SELECT `img_ID` FROM `img`WHERE `img_path`= ?');
            $req->execute(array($iurl)) && $img_id = $req->fetch();
            $id = $img_id['img_ID'];
            $_SESSION['iurl'] = 0;
            header("Location: ./image.php?id=".$id); // mettre l'id en cours
        }
}
?>
<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Instapouet - Poster une photo</title>
	<?php include('css-handler.php');?>
</head>
<body onload="uploadImage()">
<?php
    include("topmenu.php");
    redirectTo($loginpage);
?>
    <div class="main">
        <div class="container">
        <?php
            $images = get_images();
            include("post-image.php");
            if (!$uploadfile)
                include("home-user-profil.php");
            else
                include("post-stickers.php");
        ?>
        </div>
    </div>
</body>
</html>