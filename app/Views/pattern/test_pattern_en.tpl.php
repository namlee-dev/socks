<div class="container">
    <div class="alert alert-warning" role="alert">The patterns are paying, which is why you do not have access to the entire pattern.</div>

    <h1>Your pattern</h1>
    <p>Size : <?= $size->getName() ?></p>
    <p>Pattern : <?= $pattern->getName() ?></p>

    <h2 id="summary">Summary</h2>
    <ul>
        <li><a href="#before-knitting">Before knitting</a></li>
        <li><a href="#cast-on">Cast-on</a></li>
        <li><a href="#toe">Toe</a></li>
        <li><a href="#foot">Foot</a></li>
        <li><a href="#pattern">Pattern</a></li>
        <li><a href="#heel">Heel</a></li>
        <li><a href="#leg">Leg</a></li>
        <li><a href="#cuff">Cuff</a></li>
        <li><a href="#finishing">Finishing</a></li>
    </ul>

    <h2 id="before-knitting">Before knitting</h2>

    <h3>Yarn</h3>
    <?= $pattern->getYarn() ?>

    <h3>Needles</h3>
    <?= $pattern->getNeedles() ?>

    <h3>Gauge</h3>
    <p><?= $pattern->getGauge() ?></p>

    <h3>Material</h3>
    <p><?= $pattern->getMaterial() ?></p>

    <h3>Note</h3>
    <p>Instructions for toe, heel and rib in contrasting color are shown in bold.</p>

    <h2 id="cast-on">Cast-on</h2>
    <p>With Judy's Magic Cast On, cast on 12 sts. on each needle in main color <strong>or in contrasting color</strong>.</p>
    <p>=> 24 sts.</p>

    <h2 id="toe">Toe</h2>
    <p>Set-up row: k<?= $size->getCaston() ?>, pm for beginning of the sole, k<?= $size->getCaston() ?>, pm for beginning of the row.</p>
    <p>R1: * k1, yo, k to 1 st bef marker, yo, k1, sm *, repeat from * to *</p>
    <p>R2: * k1, k1tbl, k to 2 st bef marker, k1tbl, k1, sm *, repeat from * to *</p>
    <p>Repeat R1 and R2 <?= $size->getToeRepeat() ?> times in total.</p>
    <p>=> <?= $size->getTotal() ?> sts</p>

</div>