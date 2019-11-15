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
  if (!$_GET['id'] || itsMe($_GET['id']))
    $user = $me;
  else
    $user = get_user_by_ID($_GET['id']);
  include("functions/change_photo.php");
  if($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['chcover'])) {
      $uploaddir = './images/user_cover/';
      $type = '_cover.';
      
    }
    else if (isset($_POST['chpp'])) {
      $uploaddir = './images/user/';
      $type = '.';
    }
    else
      return ;
    // $ext = pathinfo($_FILES['image']['name']);
    $uploadfile = $uploaddir . $user['user_pseudo'] . $type . 'jpg';
    changePhoto( $uploadfile, $_FILES );
  }
?>
<?php
  if (!isset($_SESSION['id']) && !isset($_GET['id']))
    header("location: ./login.php");
  include("profil-header.php");
?>
<div class="container">
<?php
  include("profil-user.php");
?>
</div>
</body>
</html>