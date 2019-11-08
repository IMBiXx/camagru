<?php
   include("db_manager.php");
   $bdd = new PDO($servername.";dbname=".$dbname, $username, $password);
if(isset($_POST['inscrip']))
{
  $mdp = ($_POST['mdp']);
  $len_mdp = strlen($mdp);
    if($len_mdp > 9)
    {
      if (preg_match('#^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W)#', $mdp))
      {
              $pseudo = htmlspecialchars($_POST['pseudo']);
              $mail = htmlspecialchars($_POST['mail']);
              $mail2 = htmlspecialchars($_POST['mail2']);
              $mdp = sha1($_POST['mdp']);
              $mdp2 = sha1($_POST['mdp2']);
              if(!empty($_POST['pseudo']) && !empty($_POST['mail'] )&& !empty($_POST['mail2']) && !empty($_POST['mdp']) && !empty($_POST['mdp2']))
              {
                  $pseudolen = strlen($pseudo);
                  if($pseudolen <= 255)
                  {
                      if($mail == $mail2)
                      {
                        if(filter_var($mail, FILTER_VALIDATE_EMAIL))
                        {
                          $reqmail = $bdd->prepare('SELECT * FROM user WHERE user_email = ?');
                          $reqmail->execute(array($mail));
                          $mailexist = $reqmail->rowCount();
                          if($mailexist == 0)
                          {
                            if($mdp == $mdp2)
                            {
                              $insertmbr = $bdd->prepare("INSERT INTO user(user_pseudo, user_email, user_password, user_preferences) VALUES(?,?,?,?)");
                              $insertmbr->execute(array($pseudo, $mail, $mdp,0));           
                              $erreur = "Votre compte a bien été créé!";
                            }
                            else
                            {
                              $erreur = "Vos mot de passe ne correspondent pas !";
                            }
                          }
                          else
                          {
                            $erreur = "adresse mail déja utilisée!!";
                          }            
                        }
                        else
                        {
                          $erreur = "Votre adresse mail n est pas valide !!";
                        }
                      }
                      else
                      {
                        $erreur = "Vos adresse mail ne correspondent pas !";
                      }
                  }
                  else
                  {
                    $erreur = "Votre pseudo ne doit pas depasse 255 caracteres !";
                  }
              }
              else
              {
                  $erreur = "Tous les champ doivent etre completes !!";
              }
          }
          else{
            $erreur ="Votre mot de passe doit se composer de chiffres et de lettres et comprendre des majuscules/minuscules ou des caractères spéciaux";
          }
    }
  else
  {
    $erreur = "Votre mot de passe doit comporter un minimum de 8 caractères";
  }
  header("location: .".$_SESSION['user_id']);
}
?>
<html>
<head>
   <title>camagru inscription</title>
   <link rel="stylesheet" type="text/css" href="inscription-connexion.css">
   <meta charset="utf-8">
</head>
<body>
   <div  id ="container" >
       
       <br/><br/>
       <form  method="POST" action="">
	   <h1>Inscription</h1>
	   <fieldset>
                       <label for="pseudo"> Pseudo : </label>
                       <input type="text" placeholder="Votre pseudo" id="pseudo" name="pseudo" value="<?php if(isset($pseudo)) {echo $pseudo;}?>"/>
                  
                       <label for="mail"> Mail :</label>
                       <input type="email" placeholder="Votre mail" id="mail" name="mail" value="<?php if(isset($mail)) {echo $mail;}?>"/>
                       
					   <label for="mail2"> confirmation du Mail :</label>
                       <input type="email" placeholder="confirmer votre mail" id="mail2" name="mail2" value="<?php if(isset($mail2)) {echo $mail2;}?>"/>
             
                       <label for="mot de passe"> Mot de passe :</label>
                 
                       <input type="password" placeholder="Votre mot de passe" id="mdp" name="mdp"/>
               
                  
                       <label for="mot de passe2"> Confirmation du Mot de passe :</label>
                   
                       <input type="password" placeholder="confirmer votre mot de passe" id="mdp2" name="mdp2"/>
                   
                       <input type="submit" value="Je m'inscris" name="inscrip"/>
              
		   </fieldset>
       
       </form>
       <?php  if(isset($erreur)){echo '<font color="red">'.$erreur."</font>";}?>
    </div>
</body>
</html>

