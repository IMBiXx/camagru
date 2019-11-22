<?php
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        add_comment($me['user_ID'], $_POST['img_ID'], $_POST['comment']);
        $redirect = 'image.php?id='.$_POST['img_ID'];
        header("Location: ".$redirect);
    }
    if($_SERVER["REQUEST_METHOD"] == "GET") {
        $imgComments = get_content_by_ID($_GET['id']);
        $nbComments = count($imgComments);
        include("functions/get_time_ago.php");
    }
    include("functions/img_liked_by_user.php");
    include("functions/like.php");
?>
<div class="col-lg-9 col-md-8 center">
    <div class="main-ws-sec">
        <div class="posts-section">
            <div class="post-bar">
                <div class="post_topbar">
                    <div class="usy-dt">
                        <a href="profil.php?id=<?php echo $author['user_ID']; ?>"><img src="<?php echo $author['user_photo'] ?>" alt="<?php echo $author['user_pseudo'];?>"></a>
                        <div class="usy-name">
                            <h3><a href="profil.php?id=<?php echo $author['user_ID']; ?>"><?php echo $author['user_pseudo'];?></a></h3>
                            <span><i class="far fa-clock"></i> le <?php echo $postdate->format('d/m/Y') .' à '. $postdate->format('H:i');?></span>
                        </div>
                    </div>
                    <?php
                    if (itsMe($author['user_ID']))
                        echo '<div class="ed-opts">
                        <a href="#" title="" class="ed-opts-open" onclick="showOptions()"><i class="la la-ellipsis-v"></i></a>
                        <ul id="delete" class="ed-options hidden">
                            <li><a href="#" title="">Supprimer</a></li>
                        </ul>
                    </div>
                </div>';
                ?>
                <div class="post_content">
                    <img class="post_img" src="<?php echo($image['img_path']); ?>" alt="sample image" \>
                </div>
                <div class="post-status-bar">
                    <ul id="like-com" class="like-com">
                        <li>
                            <span onclick="like(<?php echo $_GET['id'];?>)" onmouseover="chcl('#e44b4b', 'heart')" onmouseout="chcl('#b2b2b2', 'heart-<?php echo $_GET['id'];?>')"><i id="heart-<?php echo $_GET['id'];?>" class="fas fa-heart <?php if (img_liked_by_user($me['user_ID'], $_GET['id']) == 1) { echo 'liked';}?>"></i> Like <span id="likes-<?php echo $_GET['id'];?>"><?php echo(get_nb_likes($_GET['id']));?></span></span>
                        </li> 
                        <li><a href="#comments" class="com" onmouseover="chcl('#4582EC', 'com')" onmouseout="chcl('#b2b2b2', 'com-<?php echo $_GET['id'];?>')"><i id="com-<?php echo $_GET['id'];?>" class="fas fa-comment"></i> Commentaire<?php echo plural($nbComments).' '.$nbComments;?></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <?php
        include("image-comments.php");
    ?>
</div>