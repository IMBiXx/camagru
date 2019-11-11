<?php
function debug_to_console($data) {
	$output = $data;
	if (is_array($output))
		$output = implode(',', $output);
  
	echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
  }
try{
   include("db_manager.php");
      $bdd = new PDO($servername.";dbname=".$dbname, $username, $password);
} catch(PDOException $e){
   die('Erreur:'.$e->getMessage());
}  
session_start();
if(isset($_POST['formconnexion']))
{
	// echo "<meta http-equiv='refresh' content='0'>";
  $mailconnect = htmlspecialchars($_POST['mailconnect']);
  $mdpconnect = sha1($_POST['mdpconnect']);
  if(!empty($mailconnect) && !empty($mdpconnect))
  {
	  $requser = $bdd->prepare('SELECT * FROM user WHERE user_email = ?  AND user_password = ? ');
      $requser->execute(array($mailconnect, $mdpconnect));
      $userexist = $requser->rowCount();
	  debug_to_console ($userexist);
      if($userexist != 0 )
      {
        $userinfo =$requser->fetch( ) ;
        $_SESSION['id'] = $userinfo['user_ID'];
        $_SESSION['pseudo'] = $userinfo['user_pseudo'];
        $_SESSION['mail'] = $userinfo['user_email'];
		header("location: .".$_SESSION['user_id']);
      }
      else
      {
        $erreur = "Votre mail ou mot de passe est incorrect !!";
      }


   }
   else
   {
    $erreur = "Tout les champ doivent etre complétés";
   }

}
?>
<html>
<head>
   <title>camagru connection</title>
   <meta charset="utf-8">
   <link rel="stylesheet" type="text/css" href="inscription-connexion.css">
</head>
<body>
   <div  id ="container">
       <form  method="POST" action="">
	   <h1>Connexion</h1>
	   <fieldset>
           <input type="email" name="mailconnect" placeholder="Mail" />
           <input type="password" name="mdpconnect" placeholder="Mot de passe" />
           <input type="submit" name="formconnexion" value="se connecter"  />
		   </fieldset>
       </form>
       <?php  if($erreur != ""){echo '<font color="red">'.$erreur."</font>";}?>
    </div>
</body>
</html>