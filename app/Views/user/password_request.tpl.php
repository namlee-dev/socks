<div class="container">
  <?php foreach ($errorMessageList as $errorMessage) : ?>
    <div class="alert alert-danger" role="alert"> <?= $errorMessage ?></div>
  <?php endforeach; ?>

  <?php foreach ($profileMessageList as $profileMessage) : ?>
    <div class="alert alert-success" role="alert"> <?= $profileMessage ?></div>
  <?php endforeach; ?>

  <h1>Réinitialisation du mot de passe / Password reset</h1>
  <form action="" method="POST">
    <div class="form-group">
      <label for="email">Courriel / Email</label>
      <input name="email" type="email" class="form-control" id="email">
    </div>
    <button type="submit" class="btn btn-info">Valider / Submit </button>
    <input type="hidden" name="token" value="<?= $token ?>">
  </form>
</div>