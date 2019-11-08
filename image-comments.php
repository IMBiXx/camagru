<?php
    $i = mt_rand(1, 7);
?>
<div class="comment-section">
    <h3><?php echo($i); ?> Commentaire<?php if ($i > 1) echo('s') ?></h3>
    <div class="comment-sec">
        <ul>
            
                <?php
                    for ($j = 0; $j < $i; $j++)
                        echo('<li><div class="comment-list">
                        <div class="bg-img">
                            <img src="images/user/warharra.jpg" alt="">
                        </div>
                        <div class="comment">
                            <h3>Carole Charbonnier</h3>
                            <span><img src="images/clock.png" alt=""> ' . mt_rand(1,59) .' min ago</span>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse at libero elit. Mauris ultrices sed lorem nec efficitur.</p>
                        </div>
                    </div></li>');
                ?>
            <!--comment-list end-->
        </ul>
    </div><!--comment-sec end-->
</div>
<div class="post-comment-box">
    <h3><?php echo($i); ?> Commentaire<?php if ($i > 1) echo('s') ?></h3>
    <div class="user-poster">
        <div class="usr-post-img">
            <img src="images/resources/bg-img2.png" alt="">
        </div>
        <div class="post_comment_sec">
            <form action="post-comment.php" method="post">
                <textarea placeholder="Votre commentaire"></textarea>
                <button type="submit">Commenter</button>
            </form>
        </div><!--post_comment_sec end-->
    </div><!--user-poster end-->
</div>