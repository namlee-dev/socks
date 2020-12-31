<div class="container">
    <h1>Listes</h1>
    <div class="d-flex flex-column">
    <a href="<?= $router->generate('user-list') ?>" class="btn btn-info m-1">Utilisateurs</a>
    <a href="<?= $router->generate('pattern-list') ?>" class="btn btn-info m-1">Motifs</a>
    <a href="<?= $router->generate('pattern-list-en') ?>" class="btn btn-info m-1">Patterns</a>
    </div>

    <h1>Toutes les tailles</h1>
    <form action="" method="POST">
        <div class="form-group">
            <label for="motif">Choisissez votre motif</label>
            <select class="form-control" name='motif'>
                <?php  foreach ($motifListe as $motif) : ?>
                <option><?= $motif->getName() ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <input type="submit" class="btn btn-info" name="french" value="Valider">
        <input type="hidden" name="token" value="<?= $token ?>">
    </form>

    <h1>All sizes</h1>
    <form action="" method="POST">
        <div class="form-group">
            <label for="pattern">Choose your pattern</label>
            <select class="form-control" name='pattern'>
                <?php  foreach ($patternList as $pattern) : ?>
                <option><?= $pattern->getName() ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <input type="submit" class="btn btn-info" name="english" value="Submit">
        <input type="hidden" name="token" value="<?= $token ?>">
    </form>
</div>
