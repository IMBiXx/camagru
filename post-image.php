
<div class="col-lg-9 col-md-8 no-pd">
    <div class="main-ws-sec">
        <div class="posts-section">
            <div class="post-bar">
                <div class="post_topbar">
                    <div class="usy-dt">
                        <img src="<?php echo $me['user_photo'];?>" alt="<?php echo $me['user_pseudo'];?>">
                        <div class="usy-name">
                            <h3>Poster une nouvelle photo</h3>
                        </div>
                    </div>
                </div>
                
                <div class="post_content">                    
                    <img class="post_img" src="<?php echo $iurl; ?>" alt="<?php if ($uploadfile) echo $_FILES['image']['name']; else echo 'sample image'; ?>" \>
                </div>
                <div class="post-st">
                    <ul>
                        <form enctype="multipart/form-data" action="post.php" method="post">
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                        <ul>
                                            <?php
                                            if (!$uploadfile)
                                                echo'<input type="file" class="custom-file-input post_image" id="select-img" name="image">
                                                <li><a href="#"><label class="" for="select-img">Selectionner une image</label></a></li>
                                        
                                                <input type="file" class="custom-file-input post_image" id="open-webcam" name="webcam" accept="image/*" capture="camera" />
                                                <li><a href="#" class="active"><label class="" for="open-webcam">Prendre une photo</label></a></li>
                                                <input type="submit" class="btn btn-primary" name="Envoyer" value="Envoyer">';
                                            else
                                                echo '<li><a class="post_project" href="post.php" title="">Annuler</a></li>
                                                <li><a class="post-jb active" href="#" title="">Poster l\'image</a></li>';
                                            ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </ul>
                </div>
            </div><!--post-bar end-->
        </div>
    </div><!--main-ws-sec end-->
</div>
