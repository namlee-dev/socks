<div class="container">

<?php foreach ($errorMessageList as $errorMessage) : ?>
        <div class="alert alert-danger" role="alert"> <?= $errorMessage ?></div>
<?php endforeach ?>

<a href="<?= $router->generate('pattern-list') ?>" class="btn btn-success float-right">Retour</a>

  <h1> <?= $action ?> <?= $editedMotif->getName() ?></h1>

  <form action="" method="POST">

    <div class="form-group">
      <label for="name">Nom</label>
      <input name="name"
             type="text"
             class="form-control"
             id="name"
             value="<?= $editedMotif->getName() ?>">
    </div>
    <div class="form-group">
      <label for="yarn">Fil</label>
      <input name="yarn"
             type="text"
             class="form-control"
             id="yarn"
             value="<?= $editedMotif->getYarn() ?>">
    </div>
    <div class="form-group">
      <label for="needles">Aiguilles</label>
      <textarea name="needles"
                class="form-control"
                id="needles"
                rows="5"><?= $editedMotif->getNeedles() ?></textarea>
    </div>
    <div class="form-group">
      <label for="gauge">Echantillon</label>
      <input name="gauge"
             type="text"
             class="form-control"
             id="gauge"
             value="<?= $editedMotif->getGauge() ?>">
    </div>
    <div class="form-group">
      <label for="material">Matériel</label>
      <input name="material"
             type="text"
             class="form-control"
             id="material"
             value="<?= $editedMotif->getMaterial() ?>">
    </div>
    <div class="form-group">
      <label for="pattern">Motif (en html)</label>
      <textarea name="pattern"
                class="form-control"
                id="pattern"
                rows="15"><?= $editedMotif->getPattern() ?></textarea>
    </div>
    <div class="form-group">
      <label for="legStart">Début de la jambe sur l'arrière</label>
      <input name="legStart"
             type="text"
             class="form-control"
             id="legStart"
             value="<?= $editedMotif->getLegStart() ?>">
    </div>
    <div class="form-group">
      <label for="legEnd">Fin de la jambe</label>
      <input name="legEnd"
             type="text"
             class="form-control"
             id="legEnd"
             value="<?= $editedMotif->getLegEnd() ?>">
    </div>
    <div class="form-group">
      <label for="chart">Diagramme (nom de l'image)</label>
      <input name="chart"
             type="text"
             class="form-control"
             id="chart"
             value="<?= $editedMotif->getChart() ?>">
    </div>

    <button type="submit" class="btn btn-info">Enregistrer</button>
    <input type="hidden" name="token" value="<?= $token ?>">

  </form>
</div>