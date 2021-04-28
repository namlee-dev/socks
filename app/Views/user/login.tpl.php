<div class="container">
<?php foreach ($errorMessageList as $errorMessage) : ?>
  <div class="alert alert-danger" role="alert"> <?= $errorMessage ?></div>
<?php endforeach ?>

  <h1>Se connecter / Log in</h1>
  <form action="" method="POST">
    <div class="form-group">
      <label for="email">Courriel / Email</label>
      <input name="email" type="email" class="form-control" id="email">
      <p class="small">Version test / Test version : test@test.com</p>
    </div>
    <div class="form-group">
      <label for="password">Mot de passe / Password</label>
      <input name="password" type="password" class="form-control" id="password">
      <p class="small">Version test / Test version : test</p>
    </div>
    <button type="submit" class="btn btn-info mt-4">Se connecter / Log in</button>
    <a class="btn btn-outline-info mt-4" href="<?= $router->generate('password-request') ?>">Mot de passe oublié ? / Forgot your password ?</a>
    <input type="hidden" name="token" value="<?= $token ?>">
  </form>
</div>