<nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
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
                <a href="<?= $router->generate('user-list') ?>" class="btn btn-info m-1">Utilisateurs</a>
            </li>
            <li class="nav-item">
                <a href="<?= $router->generate('pattern-list') ?>" class="btn btn-info m-1">Motifs</a>
            </li>
            <li class="nav-item">
                <a href="<?= $router->generate('pattern-list-en') ?>" class="btn btn-info m-1">Patterns</a>
            </li>
        </ul>

    </div>
</nav>
