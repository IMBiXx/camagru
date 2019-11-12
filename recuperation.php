<?php
function debug_to_console($data) {
	$output = $data;
	if (is_array($output))
		$output = implode(',', $output);
  
	echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
  }
try{
   $bdd = new PDO('mysql:host=localhost; dbname=camagru', 'wafa', 'root');
} catch(PDOException $e){
die('Erreur:'.$e->getMessage());
}  
if(isset($_POST['verif_submit'])) {
   if(!empty($_POST['verif_code']) && !empty($_POST['recup_mail'])) {
      echo "top";
      $verif_code = htmlspecialchars($_POST['verif_code']);
      echo $verif_code;
      $verif_email = htmlspecialchars($_POST['recup_mail']);
      $verif_req = $bdd->prepare('SELECT * FROM `recuperation` WHERE user_email = ? AND code = ?');
      $verif_req->execute(array($verif_email, $verif_code)) && $row = $verif_req->fetch();
      $confirme = $row['confirme'];
      $verif_req = $verif_req->rowCount();
      echo $verif_req;

      if($verif_req == 1 && $confirme == 0) {
         $up_req = $bdd->prepare('UPDATE `recuperation` SET confirme = 1 WHERE user_email = ?');
         $up_req->bindParam(array($verif_email));
         $up_req->execute(array($verif_email));
         header('Location:http://localhost:8080/camagru/recuperation.php?section=changemdp');

      } else {
         $erreur = "Code invalide";
      }
   } else {
      $erreur = "Veuillez entrer votre code de confirmation";
   }
}
if(isset($_POST['nvmdp_submit'])) {
   $email = htmlspecialchars($_POST['recup1_mail']);
   $nvmdp = htmlspecialchars($_POST['nv_mdp']);
   $len_mdp = strlen($nvmdp);
   if($len_mdp > 9)
   {
      if (preg_match('#^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W)#', $nvmdp)){
         if(isset($_POST['nv_mdp'],$_POST['cnv_mdp'])) {
            $mdp = htmlspecialchars($_POST['nv_mdp']);
            $mdpc = htmlspecialchars($_POST['cnv_mdp']);
            if(!empty($mdp) && !empty($mdpc)) {
               if($mdp == $mdpc) {
               $mdp = sha1($mdp);
                  debug_to_console($mdp);
               $ins_mdp = $bdd->prepare('UPDATE `user` SET user_password = ? WHERE user_email = ?');
               $ins_mdp->bindParam(array($mdp, $email));
               $ins_mdp->execute(array($mdp, $email));
               header('Location:http://localhost:8080/camagru/connexion.php');
               } 
               else {
                  $erreur = "Vos mots de passes ne correspondent pas";
               }
            } 
            else {
               $erreur = "Veuillez remplir tous les champs";
            }
         } 
         else {
            $erreur = "Veuillez valider votre mail grâce au code de vérification qui vous a été envoyé par mail";
         }
      } 
      else
      {
         $erreur ="Votre mot de passe doit se composer de chiffres et de lettres et comprendre des majuscules/minuscules ou des caractères spéciaux";
      }
   }
   else
   {
       $erreur = "Votre mot de passe doit comporter un minimum de 8 caractères";
   }
}

?>

   
   <!DOCTYPE html>
<html>
<head>
    <title>recuperation de mot de passe</title>
</head>
<body>
    <div>
        <h2> Recuperation de mot de passe </h2>
        <?php if (isset($_GET['section']))
        {
           $section = $_GET['section'];
                if($section == "changemdp") { ?>
         <form method="POST">
         <input type="email" placeholder="Votre adresse mail" name="recup1_mail" /><br/>
         <input type="password" placeholder="Nouveau mot de passe" name="nv_mdp"/><br/>
         <input type="password" placeholder="Confirmation du mot de passe" name="cnv_mdp"/><br/>
         <input type="submit" value="Valider" name="nvmdp_submit"/>
        </form>
        <?php }} else {?>
        <form method="POST">
            <input type="email" placeholder="Votre adresse mail" name="recup_mail" /><br/>
            <input type="texte" placeholder="Votre Code" name="verif_code" /><br/>
            <input type="submit" value="Valider" name="verif_submit" />
        </form>
        
        <?php  }if(isset($erreur)){echo '<font color="red">'.$erreur."</font>";}?>
        </div>
</body>
</html>