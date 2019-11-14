<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Instapouet - Image</title>
	<?php include('css-handler.php');?>
</head>
<body>
<?php include("topmenu.php"); ?>
<?php
include("functions/get_image.php");
?>
<div class="main">
    <div class="container">
    <?php
        include("home-user-profil.php");
        include("image-core.php");
    ?>
    </div>
</div>
</body>
</html>