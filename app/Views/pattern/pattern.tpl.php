<div class="container">
    <h1>Votre patron</h1>
    <p>Taille : <?= $taille->getName() ?></p>
    <p>Motif : <?= $motif->getName() ?></p>

    <h2 id="sommaire">Sommaire</h2>
    <ul>
    <li><a href="#avant-de-commencer">Avant de commencer</a></li>
    <li><a href="#montage">Montage</a></li>
    <li><a href="#pointe">Pointe</a></li>
    <li><a href="#pied">Pied</a></li>
    <li><a href="#motif">Motif</a></li>
    <li><a href="#talon">Talon</a></li>
    <li><a href="#jambe">Jambe</a></li>
    <li><a href="#bordure">Bordure</a></li>
    <li><a href="#finitions">Finitions</a></li>
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
    <p>Avec la méthode <a href="https://maillesnam.com/tutoriel/judys-magic-cast-on/">Judy's Magic Cast On</a>, monter <?= $taille->getCaston() ?> m. sur chaque aig. en coloris principal <strong>ou en coloris contrastant.</strong></p>
    <p>=> <?= $taille->getCastonTotal() ?> m.</p>

    <h2 id="pointe">Pointe</h2>
    <p>Rang de mise en place : tricoter <?= $taille->getCaston() ?> m. end., pm de début de semelle, tricoter <?= $taille->getCaston() ?> m. end., pm de début de rang.</p>
    <p>R1 : * 1 m. end., 1 jeté, tricoter à l’end. jusqu’à 1 m. du marqueur, 1 jeté, 1 m. end., gm *, répéter de * à *</p>
    <p>R2 : * 1 m. end., 1 m. end. torse (par le brin arrière), tricoter jusqu’à 2 m. du marqueur, 1 m. end. torse (par le brin arrière), 1 m. end., gm *, répéter de * à *</p>
    <p>Répéter R1 et R2 <?= $taille->getToeRepeat() ?> fois au total.</p>
    <p>=> <?= $taille->getTotal() ?> m.</p>

    <h2 id="pied">Pied</h2>

    <p><strong>Couper le fil contrastant et prendre le fil principal.</strong></p>
    <p>Tricoter <?= $taille->getGeneral() ?> m. selon le motif, gm, tricoter <?= $taille->getGeneral() ?> m. end.</p>
    <p>Tricoter ainsi jusqu’à 7.5 cm avant la fin du pied.</p>

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
        <p>R1 : tricoter <?= $taille->getGeneral() ?> m. selon le motif, gm, 1 m. end., 1augG, tricoter à l’end. jusqu’à 1 m. avant le marqueur, 1augD, 1 m. end.</p>
        <p>R2 : tricoter <?= $taille->getGeneral() ?> m. selon le motif, gm, tricoter à l’end. jusqu’à la fin</p>
        <p>Répéter R1 et R2 <?= $taille->getGussetRepeat() ?> fois au total.</p>
        <p>=> <?= $taille->getGussetSole() ?> m. pour la semelle, <?= $taille->getGussetTotal() ?> m. au total</p>

        <li><h3>Arrondi du talon</h3></li>
        <p>Il se tricote en aller-retour avec des rangs raccourcis à l’allemande.</p>
        <p>R1 : tricoter <?= $taille->getGeneral() ?> m. selon le motif, gm, <?= $taille->getTurnR1Principal() ?> m. end., 1augG, 1 m. end., tourner</p>
        <p><strong>OU tricoter <?= $taille->getGeneral() ?> m. selon le motif, gm, laisser le fil principal sans le couper, glisser <?= $taille->getTurnR1Contrasting() ?> m., prendre le fil contrastant, <?= $taille->getTurn() ?> m. end., 1augG, 1 m. end., tourner</strong></p>
        <p>R2 : DM, <?= $taille->getTurn() ?> m. env., 1augDE, 1 m. env., tourner</p>
        <p>R3 : DM, tricoter à l’end. jusqu’à 3 m. avant la DM, 1augG, 1 m. end., tourner</p>
        <p>R4 : DM, tricoter à l’env. jusqu’à 3 m. avant la DM, 1augDE, 1 m. env., tourner</p>
        <p>Répéter R3 et R4 <?= $taille->getTurnRepeat() ?> fois au total.</p>
        <p>=> <?= $taille->getTurntotal() ?> m. pour la semelle</p>

        <li><h3>Contrefort</h3></li>
        <p>Tourner va créer un trou qui sera comblé au rang suivant.</p>
        <p>R1 : DM, <?= $taille->getFlapR1() ?> m. end. en tricotant les DM comme une seule m. en piquant dans les 2 “jambes”, ggt, tourner</p>
        <p>R2 : Gl.1 devant, <?= $taille->getFlapR2() ?> m. env. en tricotant les DM comme une seule m. en piquant dans les 2 “jambes”, 2 m. ens. env., tourner</p>
        <p>=> <?= $taille->getFlapSide() ?> m. non tricotées de chaque côté du centre et <?= $taille->getFlapCenter() ?> m. au centre</p>
        <p>R3 : * Gl.1 derrière, 1 m. end. * répéter de * à * jusqu’à 2 m. avant le trou, Gl.1 derrière, ggt, tourner</p>
        <p>R4 : Gl.1 devant, tricoter à l’env. jusqu’à 1 m. avant le trou, 2 m. ens. env., tourner</p>
        <p>Répéter R3 et R4 jusqu’à ce qu’il reste 1 m. à l’extérieur du trou de chaque côté.</p>
        <p><strong>Couper le fil contrastant et prendre le fil principal,</strong> tricoter à l’end. <strong>les mailles en coloris contrastant</strong> jusqu’à 1 m. avant le trou, ggt, NE PAS TOURNER, la suite se tricote en rond.</p>
        <p>Tricoter <?= $taille->getGeneral() ?> m. selon le motif, gm, 2 m. ens. end., tricoter à l’end. jusqu’à la fin.</p>
    </ul>

    <h2 id="jambe">Jambe</h2>

    <?= $motif->getLegStart() ?>
    <p>Tricoter <?= $taille->getTotal() ?> m. selon le motif.</p>
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

    <a href="#sommaire">Retour au sommaire</a>

</div>
