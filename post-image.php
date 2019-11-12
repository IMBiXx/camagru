<?php
    if (!isset($_POST['image']))
        $iurl = 'https://picsum.photos/id/171/600/600';
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $uploaddir = './images/user_images/';
        $uploadfile = $uploaddir . basename($_FILES['image']['name']);
        if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)) {
            echo "Le fichier est valide, et a été téléchargé
                    avec succès. Voici plus d'informations :\n";
        } else {
            echo "Attaque potentielle par téléchargement de fichiers.
                    Voici plus d'informations :\n";
        }
        echo 'Voici quelques informations de débogage :';
        print_r($_FILES);
        print($uploadfile);
        // upload fonctionne avec tout sauf une image...
}
?>

<div class="col-lg-9 col-md-8 no-pd">
    <div class="main-ws-sec">
        <div class="posts-section">
            <div class="post-bar">
                <div class="post_topbar">
                    <div class="usy-dt">
                        <img src="images/user/ppichier.jpg" alt="">
                        <div class="usy-name">
                            <h3 style="text-transform:inherit;">Poster une nouvelle photo</h3>
                        </div>
                    </div>
                </div>
                
                <div class="post_content">                    
                    <img class="post_img" src="<?php echo $iurl; ?>" alt="sample image" \>
                </div>
                <div class="post-st">
                    <ul>
                        <form enctype="multipart/form-data" action="post.php" method="post">
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                        <input type="hidden" name="MAX_FILE_SIZE" value="30000" />
                                        <input type="file" class="custom-file-input post_image" id="select-img" name="image">
                                        <li><a href="#"><label class="" for="select-img">Selectionner une image</label></a></li>
                                    </div>
                                        <input type="file" class="custom-file-input post_image" id="open-webcam" name="webcam" accept="image/*" capture="camera" />
                                        <li><a href="#" class="active"><label class="" for="open-webcam">Prendre une photo</label></a></li>
                                </div>
                                <input type="submit" class="btn btn-primary">
                            </div>
                        </form>
                    </ul>
                </div>
            </div><!--post-bar end-->
        </div>
    </div><!--main-ws-sec end-->
</div>
