<div class="col-lg-9 col-md-8 center">
    <div class="main-ws-sec">
        <div class="post-topbar">
            <div class="user-picy usy-dt">
                <img src="images/user/warharra.jpg" alt="">
            </div>
            <div class="post-st">
                <ul>
                    <li><a class="post-jb active" href="post.php" title="Poster une photo">Poster une photo</a></li>
                </ul>
            </div><!--post-st end-->
        </div><!--post-topbar end-->
        <?php
        foreach ($images as $image) {
            $date = new DateTime($image['img_upload_date']);
            echo '<div class="posts-section">
            <div class="post-bar">
                <div class="post_topbar">
                    <div class="usy-dt">
                        <img src="'. $imguserpp.'ppichier.jpg" alt="">
                        <div class="usy-name">
                            <h3><a href="profil.php?id='. $image['user_ID'] .'">Pierr\' Antonio</a></h3>
                            <span><i class="far fa-clock"></i> le '. $date->format('d/m/Y') .' à '. $date->format('H:i') .'</span>
                        </div>
                    </div>
                    <div class="ed-opts">
                        <a href="#" title="" class="ed-opts-open" onclick="showOptions()"><i class="la la-ellipsis-v"></i></a>
                        <ul id="delete" class="ed-options hidden">
                            <li><a href="#" title="">Supprimer</a></li>
                        </ul>
                    </div>
                </div>
                
                <div class="post_content">                    
                    <a class="center" href="./image.php?id=' . $image['img_ID'] .'"><img class="post_img" src="' . $image['img_path'] . '" alt="sample image" \></a>
                </div>
                <div class="post-status-bar">
                    <ul class="like-com">
                        <li>
                            <a href="#" onclick="like(' . $image['img_ID'] .')" onmouseover="chcl(\'#e44b4b\', \'heart\')" onmouseout="chcl(\'#b2b2b2\', \'heart\')"><i id="heart" class="fas fa-heart"></i> Like ' . mt_rand(1,250) . '</a>
                        </li> 
                        <li><a href="./image.php#comments" class="com" onmouseover="chcl(\'#4582EC\', \'com\')" onmouseout="chcl(\'#b2b2b2\', \'com\')"><i id="com" class="fas fa-comment"></i> Comment ' . mt_rand(1,75) . '</a></li>
                    </ul>
                </div>
            </div><!--post-bar end-->
        </div>';
    }
        ?>
    </div><!--main-ws-sec end-->
</div>