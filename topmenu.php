<?php session_start();?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Instapouet</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

<div class="collapse navbar-collapse" id="navbarColor03">
    <ul class="navbar-nav mr-auto">
    <li class="nav-item active">
        <a class="nav-link" href="#">Accueil<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
        <?php 
        if (!$_SESSION['user'])
            echo '<a class="nav-link" href="#">Connexion</a>
            </li>';
        else
            echo '<a class="nav-link" href="#">Profil</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Déconnexion</a>
          </li>';
        ?>
    </ul>
  </div>
</nav>