<?php if ($lang === 'fr') : ?>
  <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-white border-bottom border-info">
    <a class="navbar-brand"
       href="<?= $router->generate('home') ?>">
       Accueil
    </a>

    <button class="navbar-toggler"
            type="button"
            data-toggle="collapse"
            data-target="#navbar"
            aria-controls="navbar"
            aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbar">

      <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="<?= $router->generate('abbreviations')?>">Abréviations</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= $router->generate('tutorials')?>">Tutoriels</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= $router->generate('gallery')?>">Galerie</a>
        </li>
      </ul>

      <form class="form-inline">
        <?php
          $userRole= $_SESSION['userObject']->getRole();
          if ($userRole === 'admin') : ?>
          <a href="<?= $router->generate('admin') ?>" class="btn btn-info m-1">Admin</a>
        <?php endif; ?>
        <a href="<?= $router->generate('home') ?>" class="btn btn-info m-1">Français</a>
        <a href="<?= $router->generate('home-en') ?>" class="btn btn-info m-1">English</a>
        <div class="nav-item dropdown">
          <button type="button"
                  class="btn btn-secondary dropdown-toggle"
                  id="dropdownMenuOffset"
                  data-toggle="dropdown"
                  aria-haspopup="true"
                  aria-expanded="false"
                  data-offset="10,20">
                  Mon compte
          </button>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="<?= $router->generate('user-account')?>">Voir</a>
            <a class="dropdown-item" href="<?= $router->generate('user-logout')?>">Déconnecter</a>
          </div>
        </div>
      </form>
    </div>
  </nav>
<?php endif; ?>

<?php if ($lang === 'en') : ?>
  <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-white border-bottom border-info"">
    <a class="navbar-brand"
       href="<?= $router->generate('home-en') ?>">
       Home
    </a>

    <button class="navbar-toggler"
            type="button"
            data-toggle="collapse"
            data-target="#navbar"
            aria-controls="navbar"
            aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbar">

      <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="<?= $router->generate('abbreviations-en')?>">Abbreviations</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= $router->generate('tutorials-en')?>">Tutorials</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= $router->generate('gallery-en')?>">Gallery</a>
        </li>
      </ul>

      <form class="form-inline">
        <?php
          $userRole= $_SESSION['userObject']->getRole();
          if ($userRole === 'admin') : ?>
          <a href="<?= $router->generate('admin') ?>" class="btn btn-info m-1">Admin</a>
        <?php endif; ?>
        <a href="<?= $router->generate('home') ?>" class="btn btn-info m-1">Français</a>
        <a href="<?= $router->generate('home-en') ?>" class="btn btn-info m-1">English</a>
        <div class="nav-item dropdown">
          <button type="button" class="btn btn-secondary dropdown-toggle" id="dropdownMenuOffset" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-offset="10,20">My account</button>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="<?= $router->generate('user-account-en')?>">See</a>
            <a class="dropdown-item" href="<?= $router->generate('user-logout')?>">Log out</a>
          </div>
        </div>
      </form>
    </div>
  </nav>
  <?php endif; ?>