<section class="cover-sec">
    <img src="images/user_cover/banner.jpg" alt="">
    <?php

        if (!$_GET['id'] || itsMe($_GET['id'])) {
            echo '<div class="add-pic-box">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-sm-12">					
                            <input type="file" id="file">
                            <label for="file">Modifier l\'image</label>				
                        </div>
                    </div>
                </div>
            </div>';
            $user = $me;
        }
        else
            $user = get_user_by_ID($_GET['id']);
    ?>
</section>