<div class="col-lg-9 col-md-8 no-pd">
    <div class="main-ws-sec">
        <div class="post-topbar">
            <div class="user-picy usy-dt">
                <img src="images/user/warharra.jpg" alt="">
            </div>
            <div class="post-st">
                <ul>
                    <li><a class="post-jb active" href="#" title="">Poster une photo</a></li>
                </ul>
            </div><!--post-st end-->
        </div><!--post-topbar end-->
        <?php
        for ($i = 0; $i < 5; $i++)
            echo '<div class="posts-section">
            <div class="post-bar">
                <div class="post_topbar">
                    <div class="usy-dt">
                        <img src="images/user/ppichier.jpg" alt="">
                        <div class="usy-name">
                            <h3>Pierr\' Antonio</h3>
                            <span><i class="far fa-clock"></i> le 08/11/2019 à 13:21</span>
                        </div>
                    </div>
                    <div class="ed-opts">
                        <a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
                        <ul class="ed-options">
                            <li><a href="#" title="">Supprimer</a></li>
                        </ul>
                    </div>
                </div>
                
                <div class="post_content">                    
                    <img class="post_img" src="https://picsum.photos/600" alt="sample image" \>
                </div>
                <div class="post-status-bar">
                    <ul class="like-com">
                        <li>
                            <a href="#"><i class="fas fa-heart"></i> Like ' . mt_rand(1,250) . '</a>
                        </li> 
                        <li><a href="#" class="com"><i class="fas fa-comment-alt"></i> Comment ' . mt_rand(1,75) . '</a></li>
                    </ul>
                </div>
            </div><!--post-bar end-->
        </div>';
        ?>
    </div><!--main-ws-sec end-->
</div>