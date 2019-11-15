<?php
    if (isset($_GET['id'])) {
        $images = get_image_by_user_ID($_GET['id']);
        $user = get_user_by_ID($_GET['id']);
    }
    else
        $images = get_image_by_user_ID($_SESSION['id']);
    if (($_GET['id'] && $_GET['id'] == $_SESSION['id']) || !$_GET['id'])
        $title = 'Mes images';
    else
        $title = 'Images de '.$user['user_pseudo'];
?>
    <div class="col-lg-9 paddingtop center">
        <div class="fade active show" id="images" aria-labelledby="images-tab">
            <div class="acc-setting">
                <h3><?php echo $title;?></h3>
                <div class="notbar">
                    <div class="row">
                    
                        <?php
                            if ( !$images )
                                echo '<div class="center">'.$user['user_pseudo'].' n\'a pas encore posté d\'images :(</div>';
                            else
                                foreach ($images as $image)
                                    echo('<div class="col-lg-3 col-md-4 col-sm-6 col-6">
                                        <a href="./image.php?id=' . $image['img_ID'] .'"><img src="' . $image['img_path'] . '" \></a>
                                    </div>');
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="fade hidden none" id="parametres" aria-labelledby="parametres-tab">
            <div class="acc-setting">
                <h3>Paramètres</h3>
                <form>
                    <div class="notbar">
                        <h4>Notifications par email</h4>
                        <p>Activer les notifications par email lorsque quelqu'un commente une de vos images.</p>
                        <div class="toggle-btn">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="customSwitch1" checked="">
                                <label class="custom-control-label" for="customSwitch1"></label>
                            </div>
                        </div>
                    </div>
                    <div class="cp-field">
                        <h5>Ancien mot de passe</h5>
                        <div class="cpp-fiel">
                            <input type="password" name="old-password" placeholder="Ancien mot de passe">
                            <i class="fa fa-lock"></i>
                        </div>
                    </div>
                    <div class="cp-field">
                        <h5>Nouveau mot de passe</h5>
                        <div class="cpp-fiel">
                            <input type="password" name="new-password" placeholder="Nouveau mot de passe">
                            <i class="fa fa-lock"></i>
                        </div>
                    </div>
                    <div class="cp-field">
                        <h5>Répéter le mot de passe</h5>
                        <div class="cpp-fiel">
                            <input type="password" name="repeat-password" placeholder="Répéter le mot de passe">
                            <i class="fa fa-lock"></i>
                        </div>
                    </div>
                    <div class="save-stngs">
                        <ul>
                            <li><button type="submit">Sauvegarder</button></li>
                        </ul>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>