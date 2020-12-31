<div class="container d-flex justify-content-around">
    <div class="container">
        <h1>403 Interdit</h1>
        <p>Vous ne pouvez pas accéder à cette fonctionnalité ...</p>
        <a href="<?= $router->generate('home') ?>">Retour à l'accueil</a>
    </div>
    <div class="container">
        <h1>403 Forbidden</h1>
        <p>You cannot access this feature ...</p>
        <a href="<?= $router->generate('home-en') ?>">Back to Home</a>
    </div>
</div>