    <div class="col-lg-9 paddingtop">
        <div class="fade active show" id="images" aria-labelledby="images-tab">
            <div class="acc-setting">
                <h3>Mes images</h3>
                <div class="notbar">
                    <div class="row">
                    
                        <?php $j = mt_rand(0, 20);
                        for ($i = 0; $i < $j; $i++)
                            echo('<div class="col-lg-3 col-md-4 col-sm-6 col-6">
                                <img src="https://picsum.photos/200" \>
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
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus pretium nulla quis erat dapibus, varius hendrerit neque suscipit. Integer in ex euismod, posuere lectus id</p>
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