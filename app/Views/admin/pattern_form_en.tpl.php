<div class="container">

<?php foreach ($errorMessageList as $errorMessage) : ?>
        <div class="alert alert-danger" role="alert"> <?= $errorMessage ?></div>
<?php endforeach ?>

<a href="<?= $router->generate('pattern-list-en') ?>" class="btn btn-success float-right">Return</a>

  <h1> <?= $action ?> <?= $editedPattern->getName() ?></h1>

  <form action="" method="POST">

    <div class="form-group">
      <label for="name">Name</label>
      <input name="name"
             type="text"
             class="form-control"
             id="name"
             value="<?= $editedPattern->getName() ?>">
    </div>
    <div class="form-group">
      <label for="yarn">Yarn (in html)</label>
      <textarea name="yarn"
                class="form-control"
                id="yarn"
                rows="5"><?= $editedPattern->getYarn() ?></textarea>
    </div>
    <div class="form-group">
      <label for="needles">Needles (in html)</label>
      <textarea name="needles"
                class="form-control"
                id="needles"
                rows="5"><?= $editedPattern->getNeedles() ?></textarea>
    </div>
    <div class="form-group">
      <label for="gauge">Gauge</label>
      <input name="gauge"
             type="text"
             class="form-control"
             id="gauge"
             value="<?= $editedPattern->getGauge() ?>">
    </div>
    <div class="form-group">
      <label for="material">Material</label>
      <input name="material"
             type="text"
             class="form-control"
             id="material"
             value="<?= $editedPattern->getMaterial() ?>">
    </div>
    <div class="form-group">
      <label for="pattern">Pattern (in html)</label>
      <textarea name="pattern"
                class="form-control"
                id="pattern"
                rows="15"><?= $editedPattern->getPattern() ?></textarea>
    </div>
    <div class="form-group">
      <label for="legStart">Start back leg (in html)</label>
      <textarea name="legStart"
                class="form-control"
                id="legStart"
                rows="2"><?= $editedPattern->getLegStart() ?></textarea>
    </div>
    <div class="form-group">
      <label for="legEnd">End leg</label>
      <input name="legEnd"
             type="text"
             class="form-control"
             id="legEnd"
             value="<?= $editedPattern->getLegEnd() ?>">
    </div>
    <div class="form-group">
      <label for="chart">Chart</label>
      <input name="chart"
             type="text"
             class="form-control"
             id="chart"
             value="<?= $editedPattern->getChart() ?>">
    </div>

    <button type="submit" class="btn btn-info">Enregistrer</button>
    <input type="hidden" name="token" value="<?= $token ?>">

  </form>
</div>