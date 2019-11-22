<?php
include("functions/img_liked_by_user.php");
include("functions/like.php");

?>
<div class="col-lg-9 col-md-8 center">
    <div class="main-ws-sec">
        <div class="post-topbar">
            <div class="user-picy usy-dt">
                <img src="<?php echo $me['user_photo']; ?>" alt="">
            </div>
            <div class="post-st">
                <ul>
                    <li><a class="post-jb active" href="post.php" title="Poster une photo">Poster une photo</a></li>
                </ul>
            </div><!--post-st end-->
        </div><!--post-topbar end-->
        <?php
        foreach ($images as $image) {
            $user = get_user_by_ID($image['user_ID']);
            if (img_liked_by_user($user['user_ID'], $image['img_ID']))
                $liked = ' liked';
            else
                $liked = '';
            $nbLikes = get_nb_likes($image['img_ID']);
            $nbComments = count(get_content_by_ID($image['img_ID']));
            $date = new DateTime($image['img_upload_date']);
            echo '<div class="posts-section">
            <div class="post-bar">
                <div class="post_topbar">
                    <div class="usy-dt">
                        <img src="'. $user['user_photo'].'" alt="">
                        <div class="usy-name">
                            <h3><a href="profil.php?id='. $image['user_ID'] .'">' . $user['user_pseudo'] . '</a></h3>
                            <span><i class="far fa-clock"></i> le '. $date->format('d/m/Y') .' à '. $date->format('H:i') .'</span>
                        </div>
                    </div>';
                    if (itsMe($user['user_ID']))
                        echo '<div class="ed-opts">
                        <a href="#" title="" class="ed-opts-open" onclick="showOptions(' . $image['img_ID'] .')"><i class="la la-ellipsis-v"></i></a>
                        <ul id="delete-'.$image['img_ID'].'" class="ed-options hidden">
                            <li><a href="#" title="">Supprimer</a></li>
                        </ul>
                    </div>';
                echo '</div>
                
                <div class="post_content">                    
                    <a class="center" href="./image.php?id=' . $image['img_ID'] .'"><img class="post_img" src="' . $image['img_path'] . '" alt="sample image" \></a>
                </div>
                <div class="post-status-bar">
                    <ul id="like-com-'.$image['img_ID'].'" class="like-com">
                        <li>
                            <span onclick="like(' . $image['img_ID'] .')" onmouseover="chcl(\'#e44b4b\', \'heart-'.$image['img_ID'].'\')" onmouseout="chcl(\'#b2b2b2\', \'heart-'.$image['img_ID'].'\')"><i id="heart-'.$image['img_ID'].'" class="fas fa-heart' . $liked . '"></i> Like <span id="likes-'.$image['img_ID'].'">' . $nbLikes . '</span></span>
                        </li> 
                            <li><a href="./image.php?id=' . $image['img_ID'] .'#comments" class="com" onmouseover="chcl(\'#4582EC\', \'com-'.$image['img_ID'].'\')" onmouseout="chcl(\'#b2b2b2\', \'com-'.$image['img_ID'].'\')"><i id="com-'.$image['img_ID'].'" class="fas fa-comment"></i> Commentaire' . plural($nbComments) . ' ' . $nbComments . '</a></li>
                    </ul>
                </div>
            </div><!--post-bar end-->
        </div>';
    }
        ?>
    </div><!--main-ws-sec end-->
</div>