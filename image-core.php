<?php
$image = get_image_by_ID($_GET['id']);
?>
<div class="col-lg-9 col-md-8">
    <div class="main-ws-sec">
        <div class="posts-section">
            <div class="post-bar">
                <div class="post_topbar">
                    <div class="usy-dt">
                        <img src="images/user/ppichier.jpg" alt="">
                        <div class="usy-name">
                            <h3>Pierr' Antonio</h3>
                            <span><i class="far fa-clock"></i> le 08/11/2019 à 13:21</span>
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
                    <img class="post_img" src="<?php echo($image['img_path']); ?>" alt="sample image" \>
                </div>
                <div class="post-status-bar">
                    <ul id="like-com" class="like-com">
                        <li>
                            <a href="#" onclick="like(1)" onmouseover="chcl('#e44b4b', 'heart')" onmouseout="chcl('#b2b2b2', 'heart')"><i id="heart" class="fas fa-heart"></i> Like <span id="likes"><?php echo(mt_rand(1,250));?></span></a>
                        </li> 
                        <li><a href="#comments" class="com" onmouseover="chcl('#4582EC', 'com')" onmouseout="chcl('#b2b2b2', 'com')"><i id="com" class="fas fa-comment"></i> Commentaires <?php echo(mt_rand(1,75));?></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <?php
        include("image-comments.php");
    ?>
</div>