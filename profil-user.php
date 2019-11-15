<div class="row">
    <?php
        if ($_SESSION['id']) {
            echo '<div class="col-lg-3">
            <div class="user-data full-width">
                <div class="acc-leftbar">
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <div class="user-profile">
                            <div class="user-pro-img">
                                <img src="'. $user['user_photo'] .'" alt="">';
                                if (itsMe($user))
                                    echo '<div class="add-dp" id="OpenImgUpload">
                                        <input type="file" id="file">
                                        <label for="file"><i class="fas fa-camera"></i></label>												
                                    </div>';
                        echo '</div>
                    </div>
                </div>';
        }
        if (!isset($_GET['id']) || $_GET['id'] == $_SESSION['id']) {
            echo '<a class="nav-item nav-link active" id="images-tab" data-toggle="tab" href="#" role="tab" aria-controls="images" aria-selected="true" onclick="showMenu(\'images\')">Mes images</a>
                <a class="nav-item nav-link" id="nav-status-tab" data-toggle="tab" href="#" role="tab" aria-controls="parametres" aria-selected="false" onclick="showMenu(\'parametres\')"></i>Parametres</a>';
        }
            ?>
            </div>
        </div>
    </div>
<?php include("profil-core.php"); ?>