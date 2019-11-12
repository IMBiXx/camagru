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
            include("post-image.php");
            include("post-stickers.php");
        ?>
        </div>
    </div>
    <div class="main">
        <div class="container">
        <?php
            include("post-image2.php");
            include("post-stickers2.php");
        ?>
        </div>
    </div>
</body>
</html>