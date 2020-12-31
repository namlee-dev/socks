<div class="container">

<?php foreach ($errorMessageList as $errorMessage) : ?>
  <div class="alert alert-danger" role="alert"> <?= $errorMessage ?></div>
<?php endforeach ?>

<?php foreach ($profileMessageList as $profileMessage) : ?>
  <div class="alert alert-success" role="alert"> <?= $profileMessage ?></div>
<?php endforeach; ?>

<a href="<?= $router->generate('user-account') ?>" class="btn btn-success float-right">Return</a>

  <h1> <?= $action ?> <?= $user->getName() ?></h1>

  <form action="" method="POST">

    <div class="form-group">
      <label for="name">First name</label>
      <input name="name" type="text" class="form-control" id="name" value="<?= $user->getName() ?>">
    </div>
    <div class="form-group">
      <label for="lastname">Last name</label>
      <input name="lastname" type="text" class="form-control" id="lastname" value="<?= $user->getLastname() ?>">
    </div>
    <div class="form-group">
      <label for="email">Email</label>
      <input name="email" type="email" class="form-control" id="email" value="<?= $user->getEmail() ?>">
    </div>
    <div class="form-group">
      <label for="password">Password</label>
      <input name="password" type="password" class="form-control" id="password">
      <p class="small">minimum 8 characters including 1 lowercase, 1 uppercase, 1 number and 1 special character (#%&*=@$)</p>
    </div>
    <div class="form-group">
      <label for="confirmPassword">Password confirmation</label>
      <input name="confirmPassword" type="password" class="form-control" id="confirmPassword">
    </div>

    <button type="submit" class="btn btn-info">Register</button>
    <input type="hidden" name="token" value="<?= $token ?>">

  </form>
</div>