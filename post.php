<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Instapouet - Poster une photo</title>
	<?php include('css-handler.php');?>
</head>
<body onload="<?php echo $onload; ?>">
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
<script type="text/javascript" src="js/script.js"></script>
</html>



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
if (isset($_POST['webcam']))
    echo "<script type='text/javascript'>openWebcam();</script>";
    
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
            
            if (isset($_POST['webcamuploaded'])) {
                echo "je rentre";
                
                $data = $_POST['webcamuploaded'];
                list($type, $data) = explode(';', $data);
                list(, $data)      = explode(',', $data);
                $data = base64_decode($data);
                if (!isset($_SESSION['id1']))
                    $i = 0;
                else
                    $i = $_SESSION['id1'] + 1;
                $uploadfile = file_put_contents('./images/user_images/'. $i, $data);
                $uploaddir = './images/user_images/'. $i;
                $iurl = $uploaddir;
                $_SESSION['iurl'] = $iurl;
                
            }
            else
            {
                $uploaddir = './images/user_images/';
                $uploadfile = $uploaddir . basename($_FILES['image']['name']);
                if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)) {
                    $iurl = $uploadfile;
                    $_SESSION['iurl'] = $iurl;
                   
                }
           }
    }
if (isset($_POST['poster_img']))
{
    $img_uploade_date = date("Y-m-d H:i:s");
    $req = $bdd->prepare('INSERT INTO `img`(`user_ID`, `img_name`, `img_upload_date`, `img_path`) VALUES(?,?,?,?)');
    $req->execute(array($id, "default", $img_uploade_date, $_SESSION['iurl']));
    $iurl = $_SESSION['iurl'];
    $req = $bdd->prepare('SELECT `img_ID` FROM `img` WHERE `img_path`= ?');
    $req->execute(array($iurl)) && $img_id = $req->fetch();
    $id1 = $img_id['img_ID'];
    $_SESSION['iurl'] = 0;
    $_SESSION['id'] = $id;
    header("Location: http://localhost:8080/cama/image.php?id=".$id);
}
?>
