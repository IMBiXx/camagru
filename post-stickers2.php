<div class="col-lg-3 col-md-4 wav-left-none">
    <div class="main-left-sidebar no-margin">
        <div class="user-data full-width">
            <div class="user-profile">
                <div class="username-dt">
                    <div class="usr-pic">
                        <img src="images/user/warharra.jpg" alt="">
                    </div>
                </div><!--username-dt end-->
                <div class="user-specs">
                    <h3>Wafae</h3>
                    <span>Ma description</span>
                </div>
            </div><!--user-profile end-->
            <ul class="user-fw-status">
                    <h4>Stickers</h4>
                <li>
            <?php $j = mt_rand(5, 8);
                for ($i = 0; $i < $j; $i++)
                    echo('<div class="col-lg-5 col-md-5 col-sm-6 col-6 stickers">
                        <img src="images/stickers/sticker1.png" \>
                    </div>');
                ?>
                </li>
                <li>
                    <a href="profil.php" title="">Mon profil</a>
                </li>
            </ul>
        </div><!--user-data end-->
    </div>
</div>