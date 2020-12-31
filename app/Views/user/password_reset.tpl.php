<div class="container">
  <?php foreach ($errorMessageList as $errorMessage) : ?>
    <div class="alert alert-danger" role="alert"> <?= $errorMessage ?></div>
  <?php endforeach; ?>

  <?php foreach ($profileMessageList as $profileMessage) : ?>
    <div class="alert alert-success" role="alert"> <?= $profileMessage ?></div>
  <?php endforeach; ?>

  <h1>Nouveau mot de passe / New password</h1>
  <form action="" method="POST">
    <div class="form-group">
      <label for="password">Nouveau mot de passe / New password</label>
      <input name="password"
             type="password"
             class="form-control"
             id="password">
      <p class="small">minimum 8 caractères dont 1 minuscule, 1 majuscule, 1 chiffre et 1 caractère spécial (#%&*=@$)</p>
    </div>
    <div class="form-group">
      <label for="confirmPassword">Confirmation du mot de passe / Password confirmation</label>
      <input name="confirmPassword"
             type="password"
             class="form-control"
             id="confirmPassword">
    </div>
    <button type="submit" class="btn btn-info">Valider / Submit </button>
  </form>
</div>
