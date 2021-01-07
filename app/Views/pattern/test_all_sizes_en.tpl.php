<div class="container">
    <div class="alert alert-danger" role="alert">The patterns are paying, which is why you do not have access to the entire pattern.</div>

    <?php foreach ($alertMessageList as $alertMessage) : ?>
        <div class="alert alert-danger" role="alert"> <?= $alertMessage ?></div>
    <?php endforeach ?>

    <h1>Your pattern</h1>
    <p>Pattern : <?= $pattern->getName() ?></p>

    <h2 id="summary">Summary</h2>
    <ul>
        <li><a href="#before-knitting">Before knitting</a></li>
        <li><a href="#abbreviations">Abbreviations</a></li>
        <li><a href="#cast-on">Cast-on</a></li>
        <li><a href="#toe">Toe</a></li>
    </ul>

    <h2 id="before-knitting">Before knitting</h2>

    <h3>Yarn</h3>
    <?= $pattern->getYarn() ?>

    <h3>Needles</h3>
    <?= $pattern->getNeedles() ?>

    <h3>Gauge</h3>
    <p><?= $pattern->getGauge() ?></p>

    <h3>Sizes</h3>
    <p>XS (S, M, L, XL) for a circumference of 6.5 (7.5, 8.5, 9, 9.5) in / 17 (19, 21, 23, 25) cm, or for shoes sizes FR 32/34 (35/37, 38/40, 41/43, 44/46).</p>

    <h3>Material</h3>
    <p><?= $pattern->getMaterial() ?></p>

    <h3>Note</h3>
    <p>Instructions for toe, heel and rib in contrasting color are shown in bold.</p>

    <h2 id="abbreviations">Abbreviations</h2>
    <p>Abbreviations are on <a target="_blank" href="<?= $router->generate('abbreviations-en')?>">this page</a>.</p>

    <h2 id="cast-on">Cast-on</h2>
    <p>With <a href="https://maillesnam.com/tutoriel/judys-magic-cast-on/">Judy's Magic Cast On</a>, cast on <?= $sizes[0]->getCaston() ?> (<?= $sizes[1]->getCaston() ?>, <?= $sizes[2]->getCaston() ?>, <?= $sizes[3]->getCaston() ?>, <?= $sizes[4]->getCaston() ?>) sts on each needle in main color <strong>or in contrasting color</strong>.</p>
    <p>=> <?= $sizes[0]->getCastonTotal() ?> (<?= $sizes[1]->getCastonTotal() ?>, <?= $sizes[2]->getCastonTotal() ?>, <?= $sizes[3]->getCastonTotal() ?>, <?= $sizes[4]->getCastonTotal() ?>) sts</p>

    <h2 id="toe">Toe</h2>
    <p>Set-up row: k<?= $sizes[0]->getCaston() ?> (<?= $sizes[1]->getCaston() ?>, <?= $sizes[2]->getCaston() ?>, <?= $sizes[3]->getCaston() ?>, <?= $sizes[4]->getCaston() ?>), pm for beginning of the sole, k<?= $sizes[0]->getCaston() ?> (<?= $sizes[1]->getCaston() ?>, <?= $sizes[2]->getCaston() ?>, <?= $sizes[3]->getCaston() ?>, <?= $sizes[4]->getCaston() ?>), pm for beginning of the row.</p>
    <p>R1: * k1, yo, k to 1 st bef marker, yo, k1, sm *, repeat from * to *</p>
    <p>R2: * k1, k1tbl, k to 2 st bef marker, k1tbl, k1, sm *, repeat from * to *</p>
    <p>Repeat R1 and R2 <?= $sizes[0]->getToeRepeat() ?> (<?= $sizes[1]->getToeRepeat() ?>, <?= $sizes[2]->getToeRepeat() ?>, <?= $sizes[3]->getToeRepeat() ?>, <?= $sizes[4]->getToeRepeat() ?>) times in total.</p>
    <p>=> <?= $sizes[0]->getTotal() ?> (<?= $sizes[1]->getTotal() ?>, <?= $sizes[2]->getTotal() ?>, <?= $sizes[3]->getTotal() ?>, <?= $sizes[4]->getTotal() ?>) sts</p>

</div>