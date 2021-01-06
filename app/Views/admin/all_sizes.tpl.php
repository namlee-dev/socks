<div class="container">
    <h1><?= $motif->getName() ?></h1>

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

    <h2 id="montage">Montage</h2>
    <p>Avec la méthode <a href="https://maillesnam.com/tutoriel/judys-magic-cast-on/">Judy's Magic Cast On</a>, monter <?= $tailles[0]->getCaston() ?> (<?= $tailles[1]->getCaston() ?>, <?= $tailles[2]->getCaston() ?>, <?= $tailles[3]->getCaston() ?>, <?= $tailles[4]->getCaston() ?>) m. sur chaque aig. en coloris principal <strong>ou en coloris contrastant.</strong></p>
    <p>=> <?= $tailles[0]->getCastonTotal() ?> (<?= $tailles[1]->getCastonTotal() ?>, <?= $tailles[2]->getCastonTotal() ?>, <?= $tailles[3]->getCastonTotal() ?>, <?= $tailles[4]->getCastonTotal() ?>)  m.</p>

    <h2 id="pointe">Pointe</h2>
    <p>Rang de mise en place : tricoter <?= $tailles[0]->getCaston() ?> (<?= $tailles[1]->getCaston() ?>, <?= $tailles[2]->getCaston() ?>, <?= $tailles[3]->getCaston() ?>, <?= $tailles[4]->getCaston() ?>) m. end., pm de début de semelle, tricoter <?= $tailles[0]->getCaston() ?> (<?= $tailles[1]->getCaston() ?>, <?= $tailles[2]->getCaston() ?>, <?= $tailles[3]->getCaston() ?>, <?= $tailles[4]->getCaston() ?>) m. end., pm de début de rang.</p>
    <p>R1 : * 1 m. end., 1 jeté, tricoter à l’end. jusqu’à 1 m. du marqueur, 1 jeté, 1 m. end., gm *, répéter de * à *</p>
    <p>R2 : * 1 m. end., 1 m. end. torse (par le brin arrière), tricoter jusqu’à 2 m. du marqueur, 1 m. end. torse (par le brin arrière), 1 m. end., gm *, répéter de * à *</p>
    <p>Répéter R1 et R2 <?= $tailles[0]->getToeRepeat() ?> (<?= $tailles[1]->getToeRepeat() ?>, <?= $tailles[2]->getToeRepeat() ?>, <?= $tailles[3]->getToeRepeat() ?>, <?= $tailles[4]->getToeRepeat() ?>) fois au total.</p>
    <p>=> <?= $tailles[0]->getTotal() ?> (<?= $tailles[1]->getTotal() ?>, <?= $tailles[2]->getTotal() ?>, <?= $tailles[3]->getTotal() ?>, <?= $tailles[4]->getTotal() ?>) m.</p>

    <h2 id="pied">Pied</h2>

    <p><strong>Couper le fil contrastant et prendre le fil principal.</strong></p>
    <p>Tricoter <?= $tailles[0]->getGeneral() ?> (<?= $tailles[1]->getGeneral() ?>, <?= $tailles[2]->getGeneral() ?>, <?= $tailles[3]->getGeneral() ?>, <?= $tailles[4]->getGeneral() ?>) m. selon le motif, gm, tricoter <?= $tailles[0]->getGeneral() ?> (<?= $tailles[1]->getGeneral() ?>, <?= $tailles[2]->getGeneral() ?>, <?= $tailles[3]->getGeneral() ?>, <?= $tailles[4]->getGeneral() ?>) m. end.</p>
    <p>Tricoter ainsi jusqu’à 7,5 cm avant la fin du pied.</p>

    <h2 id="motif">Motif</h2>
    <ul>
        <li><h3>Instructions écrites</h3></li>
        <?= $motif->getPattern() ?>
        <?php if (!empty($motif->getChart())) : ?>
            <li><h3>Diagramme</h3></li>
            <p>Le diagramme se lit de bas en haut et de droite à gauche pour tous les rangs.</p>
            <img class="img-fluid" src="<?= $assetsBaseUri ?>images/charts/<?= $motif->getChart() ?>" alt="Chart of <?= $motif->getName() ?>">
        <?php endif; ?>
    </ul>

    <h2 id="talon">Talon</h2>

    <ul>
        <li><h3>Gousset</h3></li>
        <p>R1 : tricoter <?= $tailles[0]->getGeneral() ?> (<?= $tailles[1]->getGeneral() ?>, <?= $tailles[2]->getGeneral() ?>, <?= $tailles[3]->getGeneral() ?>, <?= $tailles[4]->getGeneral() ?>) m. selon le motif, gm, 1 m. end., 1augG, tricoter à l’end. jusqu’à 1 m. avant le marqueur, 1augD, 1 m. end.</p>
        <p>R2 : tricoter <?= $tailles[0]->getGeneral() ?> (<?= $tailles[1]->getGeneral() ?>, <?= $tailles[2]->getGeneral() ?>, <?= $tailles[3]->getGeneral() ?>, <?= $tailles[4]->getGeneral() ?>) m. selon le motif, gm, tricoter à l’end. jusqu’à la fin</p>
        <p>Répéter R1 et R2 <?= $tailles[0]->getGussetRepeat() ?> (<?= $tailles[1]->getGussetRepeat() ?>, <?= $tailles[2]->getGussetRepeat() ?>, <?= $tailles[3]->getGussetRepeat() ?>, <?= $tailles[4]->getGussetRepeat() ?>) fois au total.</p>
        <p>=> <?= $tailles[0]->getGussetSole() ?> (<?= $tailles[1]->getGussetSole() ?>, <?= $tailles[2]->getGussetSole() ?>, <?= $tailles[3]->getGussetSole() ?>, <?= $tailles[4]->getGussetSole() ?>) m. pour la semelle, <?= $tailles[0]->getGussetTotal() ?> (<?= $tailles[1]->getGussetTotal() ?>, <?= $tailles[2]->getGussetTotal() ?>, <?= $tailles[3]->getGussetTotal() ?>, <?= $tailles[4]->getGussetTotal() ?>) m. au total</p>

        <li><h3>Arrondi du talon</h3></li>
        <p>Il se tricote en aller-retour avec des rangs raccourcis à l’allemande.</p>
        <p>R1 : tricoter <?= $tailles[0]->getGeneral() ?> (<?= $tailles[1]->getGeneral() ?>, <?= $tailles[2]->getGeneral() ?>, <?= $tailles[3]->getGeneral() ?>, <?= $tailles[4]->getGeneral() ?>) m. selon le motif, gm, <?= $tailles[0]->getTurnR1Principal() ?> (<?= $tailles[1]->getTurnR1Principal() ?>, <?= $tailles[2]->getTurnR1Principal() ?>, <?= $tailles[3]->getTurnR1Principal() ?>, <?= $tailles[4]->getTurnR1Principal() ?>) m. end., 1augG, 1 m. end., tourner</p>
        <p><strong>OU tricoter <?= $tailles[0]->getGeneral() ?> (<?= $tailles[1]->getGeneral() ?>, <?= $tailles[2]->getGeneral() ?>, <?= $tailles[3]->getGeneral() ?>, <?= $tailles[4]->getGeneral() ?>) m. selon le motif, gm, laisser le fil principal sans le couper, glisser <?= $tailles[0]->getTurnR1Contrasting() ?> (<?= $tailles[1]->getTurnR1Contrasting() ?>, <?= $tailles[2]->getTurnR1Contrasting() ?>, <?= $tailles[3]->getTurnR1Contrasting() ?>, <?= $tailles[4]->getTurnR1Contrasting() ?>) m., prendre le fil contrastant, <?= $tailles[0]->getTurn() ?> (<?= $tailles[1]->getTurn() ?>, <?= $tailles[2]->getTurn() ?>, <?= $tailles[3]->getTurn() ?>, <?= $tailles[4]->getTurn() ?>) m. end., 1augG, 1 m. end., tourner</strong></p>
        <p>R2 : DM, <?= $tailles[0]->getTurn() ?> (<?= $tailles[1]->getTurn() ?>, <?= $tailles[2]->getTurn() ?>, <?= $tailles[3]->getTurn() ?>, <?= $tailles[4]->getTurn() ?>) m. env., 1augDE, 1 m. env., tourner</p>
        <p>R3 : DM, tricoter à l’end. jusqu’à 3 m. avant la DM, 1augG, 1 m. end., tourner</p>
        <p>R4 : DM, tricoter à l’env. jusqu’à 3 m. avant la DM, 1augDE, 1 m. env., tourner</p>
        <p>Répéter R3 et R4 <?= $tailles[0]->getTurnRepeat() ?> (<?= $tailles[1]->getTurnRepeat() ?>, <?= $tailles[2]->getTurnRepeat() ?>, <?= $tailles[3]->getTurnRepeat() ?>, <?= $tailles[4]->getTurnRepeat() ?>) fois au total.</p>
        <p>=> <?= $tailles[0]->getTurnTotal() ?> (<?= $tailles[1]->getTurnTotal() ?>, <?= $tailles[2]->getTurnTotal() ?>, <?= $tailles[3]->getTurnTotal() ?>, <?= $tailles[4]->getTurnTotal() ?>) m. pour la semelle</p>

        <li><h3>Contrefort</h3></li>
        <p>Tourner va créer un trou qui sera comblé au rang suivant.</p>
        <p>R1 : DM, <?= $tailles[0]->getFlapR1() ?> (<?= $tailles[1]->getFlapR1() ?>, <?= $tailles[2]->getFlapR1() ?>, <?= $tailles[3]->getFlapR1() ?>, <?= $tailles[4]->getFlapR1() ?>) m. end. en tricotant les DM comme une seule m. en piquant dans les 2 “jambes”, ggt, tourner</p>
        <p>R2 : Gl.1 derrière, <?= $tailles[0]->getFlapR2() ?> (<?= $tailles[1]->getFlapR2() ?>, <?= $tailles[2]->getFlapR2() ?>, <?= $tailles[3]->getFlapR2() ?>, <?= $tailles[4]->getFlapR2() ?>) m. env. en tricotant les DM comme une seule m. en piquant dans les 2 “jambes”, 2 m. ens. env., tourner</p>
        <p>=> <?= $tailles[0]->getFlapSide() ?> (<?= $tailles[1]->getFlapSide() ?>, <?= $tailles[2]->getFlapSide() ?>, <?= $tailles[3]->getFlapSide() ?>, <?= $tailles[4]->getFlapSide() ?>) m. non tricotées de chaque côté du centre et <?= $tailles[0]->getFlapCenter() ?> (<?= $tailles[1]->getFlapCenter() ?>, <?= $tailles[2]->getFlapCenter() ?>, <?= $tailles[3]->getFlapCenter() ?>, <?= $tailles[4]->getFlapCenter() ?>) m. au centre</p>
        <p>R3 : * Gl.1 derrière, 1 m. end. * répéter de * à * jusqu’à 2 m. avant le trou, Gl.1 derrière, ggt, tourner</p>
        <p>R4 : Gl.1 devant, tricoter à l’env. jusqu’à 1 m. avant le trou, 2 m. ens. env., tourner</p>
        <p>Répéter R3 et R4 jusqu’à ce qu’il reste 1 m. à l’extérieur du trou de chaque côté.</p>
        <p><strong>Couper le fil contrastant et prendre le fil principal,</strong> tricoter à l’end. <strong>les mailles en coloris contrastant</strong> jusqu’à 1 m. avant le trou, ggt, NE PAS TOURNER, la suite se tricote en rond.</p>
        <p>Tricoter <?= $tailles[0]->getGeneral() ?> (<?= $tailles[1]->getGeneral() ?>, <?= $tailles[2]->getGeneral() ?>, <?= $tailles[3]->getGeneral() ?>, <?= $tailles[4]->getGeneral() ?>) m. selon le motif, gm, 2 m. ens. end., tricoter à l’end. jusqu’à la fin.</p>
    </ul>

    <h2 id="jambe">Jambe</h2>

    <?= $motif->getLegStart() ?>
    <p>Tricoter <?= $tailles[0]->getTotal() ?> (<?= $tailles[1]->getTotal() ?>, <?= $tailles[2]->getTotal() ?>, <?= $tailles[3]->getTotal() ?>, <?= $tailles[4]->getTotal() ?>) m. selon le motif.</p>
    <p>Tricoter autant de rangs que nécessaire pour atteindre la hauteur souhaitée.
    <p><?= $motif->getLegEnd() ?></p>

    <h2 id="bordure">Bordure</h2>

    <p><strong>Couper le fil principal et prendre le fil contrastant.</strong></p>
    <p>R1 : * 1 m. end. torse (par le brin arrière), 1 m. env. *, répéter de * à * jusqu’à la fin</p>
    <p>Répéter R1 12 fois au total.</p>
    <p>Rabattre souplement avec le <a href="https://maillesnam.com/tutoriel/jenys-surprisingly-stretchy-binf-off/">Jeny’s Surprisingly Bind Off</a>.</p>

    <h2 id="finitions">Finitions</h2>

    <p>Tricoter une seconde chaussette.</p>
    <p>Rentrer les fils et bloquer les chaussettes humides.</p>

</div>

<?php
    require __DIR__ . '/../main/abbreviations.tpl.php';
?>
