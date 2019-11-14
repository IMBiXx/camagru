<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Instapouet - Connexion</title>
	<?php include('css-handler.php');?>
</head>
<body>
<?php
  include("topmenu.php"); ?>
<?php
  if (!isset($_SESSION['id']) && !isset($_GET['id']))
    header("location: ./login.php");
  include("functions/get_image.php");
  include("profil-header.php");
?>
<div class="container">
<?php
  include("profil-user.php");
?>
</div>
</body>
</html>