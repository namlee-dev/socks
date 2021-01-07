<?php if ($lang === 'fr') : ?>
    <h1>Vos chaussettes</h1>
    <form action="" method="POST">
        <div class="form-group">
            <label for="taille">Choisissez votre taille</label>
            <select class="form-control" name='taille'>
                <?php  foreach ($tailleListe as $taille) : ?>
                <option><?= $taille->getName() ?></option>
                <?php endforeach; ?>
                <option>Toutes les tailles</option>
            </select>
        </div>
        <div class="form-group">
            <label for="motif">Choisissez votre motif</label>
            <select class="form-control" name='motif'>
                <?php  foreach ($motifListe as $motif) : ?>
                <option><?= $motif->getName() ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <button type="submit" class="btn btn-info mt-4">Valider</button>
        <input type="hidden" name="token" value="<?= $token ?>">
        <a class="btn btn-outline-info mt-4" href="<?= $router->generate('gallery')?>">Voir les différents motifs</a>
    </form>
<?php endif; ?>

<?php if ($lang === 'en') : ?>
    <h1>Your socks</h1>
    <form action="" method="POST">
        <div class="form-group">
            <label for="size">Choose your size</label>
            <select class="form-control" name='size'>
                <?php  foreach ($sizeList as $size) : ?>
                <option><?= $size->getName() ?></option>
                <?php endforeach; ?>
                <option>All sizes</option>
            </select>
        </div>
        <div class="form-group">
            <label for="pattern">Choose your pattern</label>
            <select class="form-control" name='pattern'>
                <?php  foreach ($patternList as $pattern) : ?>
                <option><?= $pattern->getName() ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <button type="submit" class="btn btn-info mt-4">Submit</button>
        <input type="hidden" name="token" value="<?= $token ?>">
        <a type="button" class="btn btn-outline-info mt-4" href="<?= $router->generate('gallery-en')?>">See the different patterns</a>
    </form>
<?php endif; ?>
