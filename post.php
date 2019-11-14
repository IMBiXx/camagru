<?php
    if (!isset($_POST['image']))
        $iurl = 'https://picsum.photos/id/171/600/600';
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $uploaddir = './images/user_images/';
        $uploadfile = $uploaddir . basename($_FILES['image']['name']);
        if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)) {
            $iurl = $uploadfile;
        } else {
            echo "Erreur lors de l'upload\n";
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
<body>
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