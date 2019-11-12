<div class="col-lg-6 center">
    <form action="connexion.php" method="post">
        <fieldset>
            <label>Adresse email</label>
            <div class="form-group">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-envelope-open"></i></span>
                    </div>
                <input type="email" name="mailconnect" class="form-control" aria-describedby="emailHelp" placeholder="Entrez votre adresse email">
                </div>
            </div>
            <label>Mot de passe</label>
            <div class="form-group">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-lock"></i></span>
                    </div>
                <input type="password" name="mdpconnect" class="form-control" placeholder="Entrez votre mot de passe">
                </div>
            </div>
            <button type="submit" name="formconnexion" class="btn btn-primary">Se connecter</button>
        </fieldset>
    </form>
</div>