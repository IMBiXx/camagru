<?php session_start();?>
<nav class="site-header sticky-top py-1">
  <div class="container d-flex flex-column flex-md-row justify-content-between">
    <a class="py-2" href="#">
    <i class="fab fa-instagram" style="font-size:30px;"></i>
        </a>
        <span></span>
    <a class="py-2 d-none d-md-inline-block" href=".">Accueil</a>
    <?php 
    if (!$_SESSION['pseudo'])
        echo '<a class="py-2 d-none d-md-inline-block" href="./login.php">Connexion</a>
        <a class="py-2 d-none d-md-inline-block" href="./register.php">Inscription</a>';
    else
            echo '<a class="py-2 d-none d-md-inline-block" href="./profil.php">Profil</a>
            <a class="py-2 d-none d-md-inline-block" href="./logout.php">Déconnexion</a>';
    ?>
<span></span>
  </div>
</nav>