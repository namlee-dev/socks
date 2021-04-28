<div class="container d-flex justify-content-around">
    <div class="container">
        <h1>404 Non trouvé</h1>
        <p>La ressource demandée n'existe pas ...</p>
        <a href="<?= $router->generate('home') ?>">Retour à l'accueil</a>
    </div>
    <div class="container">
        <h1>404 Not Found</h1>
        <p>The requested resource does not exist ...</p>
        <a href="<?= $router->generate('home-en') ?>">Back to Home</a>
    </div>
</div>