<div class="container">
    <div class="alert alert-danger" role="alert">Les patrons sont payants, c'est pourquoi vous n'avez pas accès à l'entièreté du patron.</div>

    <h1>Votre patron</h1>
    <p>Taille : <?= $taille->getName() ?></p>
    <p>Motif : <?= $motif->getName() ?></p>

    <h2 id="sommaire">Sommaire</h2>
    <ul>
        <li><a href="#avant-de-commencer">Avant de commencer</a></li>
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

    <h3>Matériel</h3>
    <p><?= $motif->getMaterial()?></p>

    <h3>Remarque</h3>
    <p>Les instructions pour une pointe, un talon et des côtes en coloris contrastant sont indiquées en gras.</p>

    <h2 id="montage">Montage</h2>
    <p>Avec la méthode Judy’s Magic Cast On, monter <?= $taille->getCaston() ?> m. sur chaque aig. en coloris principal <strong>ou en coloris contrastant.</strong></p>
    <p>=> <?= $taille->getCastonTotal() ?> m.</p>

    <h2 id="pointe">Pointe</h2>
    <p>Rang d’installation : tricoter <?= $taille->getCaston() ?> m. end., pm de début de semelle, tricoter <?= $taille->getCaston() ?> m. end., pm de début de rang.</p>
    <p>R1 : * 1 m. end., 1 jeté, tricoter à l’end. jusqu’à 1 m. de la fin de l’aig., 1 jeté, 1 m. end., gm *, répéter de * à *</p>
    <p>R2 : * 1 m. end., 1 m. end. torse (par le brin arrière), tricoter jusqu’à 2 m. de la fin de l’aig., 1 m. end. torse (par le brin arrière), 1 m. end., gm *, répéter de * à *</p>
    <p>Répéter R1 et R2 <?= $taille->getToeRepeat() ?> fois au total.</p>
    <p>=> <?= $taille->getTotal() ?> m.</p>

</div>