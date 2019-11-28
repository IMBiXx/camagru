<section class="cover-sec" style="background-image:url('<?php echo $user['user_cover'];?>')">
<img class="none" src="<?php echo $user['user_cover'];?>" alt="">
    <?php
        if (!$_GET['id'] || itsMe($_GET['id']))
            echo '<form id="cover" enctype="multipart/form-data" action="profil.php" method="post"><div class="add-pic-box">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-sm-12">					
                            <input type="file" id="file" name="image">
                            <label for="file">Modifier l\'image</label>
                            <input type="submit" name="chcover" value="chcover">
                        </div>
                    </div>
                </div>
            </div></form>';
    ?>
</section>