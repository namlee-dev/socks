<div class="container">
    <h1>My account</h1>
    <p><strong>First name : </strong></p>
    <p><?= $user->getName() ?></p>
    <p><strong>Last name : </strong></p>
    <p><?= $user->getLastname() ?></p>
    <p><strong>Email : </strong></p>
    <p><?= $user->getEmail() ?></p>
    <p><a class="btn btn-info" href="<?= $router->generate('user-account-edit-en', ['id'  => $user->getId()]) ?>">Edit my data</a></p>
    <p>To delete your account, please send me an email : </p>
    <a target="_blank" href="mailto:info@maillesnam.com">info@maillesnam.com</a>
    <input type="hidden" name="token" value="<?= $token ?>">
</div>

