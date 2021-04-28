<div class="container">
    <div class="alert alert-warning" role="alert">Les patrons sont payants, c'est pourquoi vous n'avez pas accès à l'entièreté du patron.</div>

    <?php foreach ($alertMessageList as $alertMessage) : ?>
        <div class="alert alert-danger" role="alert"> <?= $alertMessage ?></div>
    <?php endforeach ?>

    <h1>Votre patron</h1>
    <p>Motif : <?= $motif->getName() ?></p>

    <h2 id="sommaire">Sommaire</h2>
    <ul>
        <li><a href="#avant-de-commencer">Avant de commencer</a></li>
        <li><a href="#abréviations">Abréviations</a></li>
        <li><a href="#montage">Montage</a></li>
        <li><a href="#pointe">Pointe</a></li>
    </ul>

    <h2 id="avant-de-commencer">Avant de commencer</h2>

    <h3>Fil</h3>
    <?= $motif->getYarn()?>

    <h3>Aiguilles</h3>
    <?= $motif->getNeedles()?>

    <h3>Echantillon</h3>
    <p><?= $motif->getGauge()?></p>

    <h3>Tailles</h3>
    <p>XS (S, M, L, XL) pour une circonférence de 17 (19, 21, 23, 25) cm ou pour les pointures FR 32/34 (35/37, 38/40, 41/43, 44/46).</p>

    <h3>Matériel</h3>
    <p><?= $motif->getMaterial()?></p>

    <h3>Remarque</h3>
    <p>Les instructions pour une pointe, un talon et des côtes en coloris contrastant sont indiquées en gras.</p>

    <h2 id="abréviations">Abréviations</h2>
    <p>Les abréviations sont sur <a target="_blank" href="<?= $router->generate('abbreviations')?>">cette page</a>.</p>

    <h2 id="montage">Montage</h2>
    <p>Avec la méthode <a href="https://maillesnam.com/tutoriel/judys-magic-cast-on/">Judy's Magic Cast On</a>, monter <?= $tailles[0]->getCaston() ?> (<?= $tailles[1]->getCaston() ?>, <?= $tailles[2]->getCaston() ?>, <?= $tailles[3]->getCaston() ?>, <?= $tailles[4]->getCaston() ?>) m. sur chaque aig. en coloris principal <strong>ou en coloris contrastant.</strong></p>
    <p>=> <?= $tailles[0]->getCastonTotal() ?> (<?= $tailles[1]->getCastonTotal() ?>, <?= $tailles[2]->getCastonTotal() ?>, <?= $tailles[3]->getCastonTotal() ?>, <?= $tailles[4]->getCastonTotal() ?>)  m.</p>

    <h2 id="pointe">Pointe</h2>
    <p>Rang de mise en place : tricoter <?= $tailles[0]->getCaston() ?> (<?= $tailles[1]->getCaston() ?>, <?= $tailles[2]->getCaston() ?>, <?= $tailles[3]->getCaston() ?>, <?= $tailles[4]->getCaston() ?>) m. end., pm de début de semelle, tricoter <?= $tailles[0]->getCaston() ?> (<?= $tailles[1]->getCaston() ?>, <?= $tailles[2]->getCaston() ?>, <?= $tailles[3]->getCaston() ?>, <?= $tailles[4]->getCaston() ?>) m. end., pm de début de rang.</p>
    <p>R1 : * 1 m. end., 1 jeté, tricoter à l’end. jusqu’à 1 m. du marqueur, 1 jeté, 1 m. end., gm *, répéter de * à *</p>
    <p>R2 : * 1 m. end., 1 m. end. torse (par le brin arrière), tricoter jusqu’à 2 m. du marqueur, 1 m. end. torse (par le brin arrière), 1 m. end., gm *, répéter de * à *</p>
    <p>Répéter R1 et R2 <?= $tailles[0]->getToeRepeat() ?> (<?= $tailles[1]->getToeRepeat() ?>, <?= $tailles[2]->getToeRepeat() ?>, <?= $tailles[3]->getToeRepeat() ?>, <?= $tailles[4]->getToeRepeat() ?>) fois au total.</p>
    <p>=> <?= $tailles[0]->getTotal() ?> (<?= $tailles[1]->getTotal() ?>, <?= $tailles[2]->getTotal() ?>, <?= $tailles[3]->getTotal() ?>, <?= $tailles[4]->getTotal() ?>) m.</p>

</div>