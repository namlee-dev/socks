<div class="container">
    <h1>Mon compte</h1>
    <p><strong>Prénom : </strong></p>
    <p><?= $user->getName() ?></p>
    <p><strong>Nom : </strong></p>
    <p><?= $user->getLastname() ?></p>
    <p><strong>Courriel : </strong></p>
    <p><?= $user->getEmail() ?></p>
    <p><a class="btn btn-info" href="<?= $router->generate('user-account-edit', ['id' => $user->getId()]) ?>">Modifier mes données</a></p>
    <p>Pour supprimer votre compte, merci de m'envoyer un courriel : </p>
    <a target="_blank" href="mailto:info@maillesnam.com">info@maillesnam.com</a>
    <input type="hidden" name="token" value="<?= $token ?>">
</div>

