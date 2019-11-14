<?php
$comments = get_content_by_user_ID($_SESSION['id']);
$user_images = get_image_by_user_ID($_SESSION['id']);
?>
<div class="col-lg-3 col-md-4 wav-left-none">
    <div class="main-left-sidebar no-margin">
        <div class="user-data full-width">
            <div class="user-profile">
                <div class="username-dt">
                    <div class="usr-pic">
                        <img src="<?php echo $me['user_photo'];?>" alt="">
                    </div>
                </div><!--username-dt end-->
                <div class="user-specs">
                    <h3><?php echo $me['user_pseudo'];?></h3>
                    <span><?php echo $me['user_description'];?></span>
                </div>
            </div><!--user-profile end-->
            <ul class="user-fw-status">
                <li>
                    <h4>Images</h4>
                    <span><?php echo (count($user_images));?></span>
                </li>
                <li>
                    <h4>Commentaires</h4>
                    <span><?php echo (count($comments)); ?></span>
                </li>
                <li>
                    <a href="profil.php" title="">Mon profil</a>
                </li>
            </ul>
        </div><!--user-data end-->
    </div>
</div>