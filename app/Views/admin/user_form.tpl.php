<div class="container">

<?php foreach ($errorMessageList as $errorMessage) : ?>
        <div class="alert alert-danger" role="alert"> <?= $errorMessage ?></div>
<?php endforeach ?>

<a href="<?= $router->generate('user-list') ?>" class="btn btn-success float-right">Retour</a>

  <h1> <?= $action ?> <?= $user->getName() ?></h1>

  <form action="" method="POST">

    <div class="form-group">
      <label for="name">Prénom</label>
      <input name="name"
             type="text"
             class="form-control"
             id="name"
             value="<?= $user->getName() ?>">
    </div>
    <div class="form-group">
      <label for="lastname">Nom</label>
      <input name="lastname"
             type="text"
             class="form-control"
             id="lastname"
             value="<?= $user->getLastname() ?>">
    </div>
    <div class="form-group">
      <label for="email">Courriel</label>
      <input name="email"
             type="email"
             class="form-control"
             id="email"
             value="<?= $user->getEmail() ?>">
    </div>
    <div class="form-group">
      <label for="password">Mot de passe</label>
      <input name="password"
             type="password"
             class="form-control"
             id="password">
    </div>
    <div class="form-group">
      <label for="role">Rôle</label>
      <select class="custom-select" id="role" name="role">
        <option value="">-</option>
        <option value="test" <?= $user->getRole() == 'test' ? ' selected' : '' ?>>Test</option>
        <option value="user" <?= $user->getRole() == 'user' ? ' selected' : '' ?>>User</option>
        <option value="admin" <?= $user->getRole() == 'admin' ? ' selected' : '' ?>>Admin</option>
      </select>
    </div>

    <button type="submit" class="btn btn-info">Enregistrer</button>
    <input type="hidden" name="token" value="<?= $token ?>">

  </form>
</div>