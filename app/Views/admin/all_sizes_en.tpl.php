<div class="container">
    <h1><?= $pattern->getName() ?></h1>

    <h2 id="before-knitting">Before knitting</h2>

    <h3>Yarn</h3>
    <p><?= $pattern->getYarn() ?></p>

    <h3>Needles</h3>
    <p><?= $pattern->getNeedles() ?></p>

    <h3>Gauge</h3>
    <p><?= $pattern->getGauge() ?></p>

    <h3>Sizes</h3>
    <p>XS (S, M, L, XL) for a circumference of 6.5 (7.5, 8.5, 9, 9.5) in or for shoes sizes FR 32/34 (35/37, 38/40, 41/43, 44/46)</p>

    <h3>Material</h3>
    <p><?= $pattern->getMaterial() ?></p>

    <h3>Note</h3>
    <p>The instructions for toe, heel and rib in contrasting color are shown in bold.</p>

    <h2 id="cast-on">Cast-on</h2>
    <p>With the <a href="https://maillesnam.com/tutoriel/judys-magic-cast-on/">Judy's Magic Cast On</a>, cast on <?= $sizes[0]->getCaston() ?> (<?= $sizes[1]->getCaston() ?>, <?= $sizes[2]->getCaston() ?>, <?= $sizes[3]->getCaston() ?>, <?= $sizes[4]->getCaston() ?>) sts. on each needle in main color <strong>or in contrasting color</strong>.</p>
    <p>=> <?= $sizes[0]->getCastonTotal() ?> (<?= $sizes[1]->getCastonTotal() ?>, <?= $sizes[2]->getCastonTotal() ?>, <?= $sizes[3]->getCastonTotal() ?>, <?= $sizes[4]->getCastonTotal() ?>) sts.</p>

    <h2 id="toe">Toe</h2>
    <p>Set-up row : pm for the beginning of the row, k<?= $sizes[0]->getCaston() ?> (<?= $sizes[1]->getCaston() ?>, <?= $sizes[2]->getCaston() ?>, <?= $sizes[3]->getCaston() ?>, <?= $sizes[4]->getCaston() ?>), pm for the beginning of the sole, k<?= $sizes[0]->getCaston() ?> (<?= $sizes[1]->getCaston() ?>, <?= $sizes[2]->getCaston() ?>, <?= $sizes[3]->getCaston() ?>, <?= $sizes[4]->getCaston() ?>).</p>
    <p>R1 : * k1, yo, k to 1 st. bef. the end of the needle, yo, k1, sm *, repeat from * to *</p>
    <p>R2 : * k1, k1tbl, k to 2 st. bef. the end of the needle, k1tbl, k1, sm *, repeat from * to *</p>
    <p>Repeat R1 and R2 <?= $sizes[0]->getToeRepeat() ?> (<?= $sizes[1]->getToeRepeat() ?>, <?= $sizes[2]->getToeRepeat() ?>, <?= $sizes[3]->getToeRepeat() ?>, <?= $sizes[4]->getToeRepeat() ?>) times in total.</p>
    <p>=> <?= $sizes[0]->getTotal() ?> (<?= $sizes[1]->getTotal() ?>, <?= $sizes[2]->getTotal() ?>, <?= $sizes[3]->getTotal() ?>, <?= $sizes[4]->getTotal() ?>) sts.</p>

    <h2 id="foot">Foot</h2>
    <p><strong>Cut the contrasting yarn and take the main yarn.</strong></p>
    <p>k<?= $sizes[0]->getGeneral() ?> (<?= $sizes[1]->getGeneral() ?>, <?= $sizes[2]->getGeneral() ?>, <?= $sizes[3]->getGeneral() ?>, <?= $sizes[4]->getGeneral() ?>) in pattern, sm, k<?= $sizes[0]->getGeneral() ?> (<?= $sizes[1]->getGeneral() ?>, <?= $sizes[2]->getGeneral() ?>, <?= $sizes[3]->getGeneral() ?>, <?= $sizes[4]->getGeneral() ?>).</p>
    <p>Continue like this until 7.5 cm bef. the end of the foot.</p>

    <h2 id="pattern">Pattern</h2>
    <ul>
        <li><h3>Written instructions</h3></li>
        <p><?= $pattern->getPattern() ?></p>
        <?php if (!empty($pattern->getChart())) : ?>
            <li><h3>Chart</h3></li>
                <img class="img-fluid" src="<?= $assetsBaseUri ?>images/charts/<?= $pattern->getChart() ?>" alt="Chart of <?= $pattern->getName() ?>">
        <?php endif; ?>
    </ul>

    <h2 id="heel">Heel</h2>

    <ul>
        <li><h3>Gusset</h3></li>
        <p>R1 : k<?= $sizes[0]->getGeneral() ?> (<?= $sizes[1]->getGeneral() ?>, <?= $sizes[2]->getGeneral() ?>, <?= $sizes[3]->getGeneral() ?>, <?= $sizes[4]->getGeneral() ?>) in pattern, sm, k1, M1L, k to 1 st. bef. the marker, M1R, k1</p>
        <p>R2 : k<?= $sizes[0]->getGeneral() ?> (<?= $sizes[1]->getGeneral() ?>, <?= $sizes[2]->getGeneral() ?>, <?= $sizes[3]->getGeneral() ?>, <?= $sizes[4]->getGeneral() ?>) in pattern, sm, k to the end</p>
        <p>Repeat R1 and R2 <?= $sizes[0]->getGussetRepeat() ?> (<?= $sizes[1]->getGussetRepeat() ?>, <?= $sizes[2]->getGussetRepeat() ?>, <?= $sizes[3]->getGussetRepeat() ?>, <?= $sizes[4]->getGussetRepeat() ?>) times in total.</p>
        <p>=> <?= $sizes[0]->getGussetSole() ?> (<?= $sizes[1]->getGussetSole() ?>, <?= $sizes[2]->getGussetSole() ?>, <?= $sizes[3]->getGussetSole() ?>, <?= $sizes[4]->getGussetSole() ?>) sts. for the sole, <?= $sizes[0]->getGussetTotal() ?> (<?= $sizes[1]->getGussetTotal() ?>, <?= $sizes[2]->getGussetTotal() ?>, <?= $sizes[3]->getGussetTotal() ?>, <?= $sizes[4]->getGussetTotal() ?>) sts. in total</p>

        <li><h3>Heel turn</h3></li>
        <p>Knitted back and forth with German Short Rows.</p>
        <p>R1 : k<?= $sizes[0]->getGeneral() ?> (<?= $sizes[1]->getGeneral() ?>, <?= $sizes[2]->getGeneral() ?>, <?= $sizes[3]->getGeneral() ?>, <?= $sizes[4]->getGeneral() ?>) in pattern, sm, k<?= $sizes[0]->getTurnR1Principal() ?> (<?= $sizes[1]->getTurnR1Principal() ?>, <?= $sizes[2]->getTurnR1Principal() ?>, <?= $sizes[3]->getTurnR1Principal() ?>, <?= $sizes[4]->getTurnR1Principal() ?>), M1L, k1, turn</p>
        <p><strong>OR k<?= $sizes[0]->getGeneral() ?> (<?= $sizes[1]->getGeneral() ?>, <?= $sizes[2]->getGeneral() ?>, <?= $sizes[3]->getGeneral() ?>, <?= $sizes[4]->getGeneral() ?>) in pattern, sm, leave the main yarn without cutting it, sl. <?= $sizes[0]->getTurnR1Contrasting() ?> (<?= $sizes[1]->getTurnR1Contrasting() ?>, <?= $sizes[2]->getTurnR1Contrasting() ?>, <?= $sizes[3]->getTurnR1Contrasting() ?>, <?= $sizes[4]->getTurnR1Contrasting() ?>), take the contrasting yarn, k<?= $sizes[0]->getTurn() ?> (<?= $sizes[1]->getTurn() ?>, <?= $sizes[2]->getTurn() ?>, <?= $sizes[3]->getTurn() ?>, <?= $sizes[4]->getTurn() ?>), M1L, k1, turn</strong></p>
        <p>R2 : DS, p<?= $sizes[0]->getTurn() ?> (<?= $sizes[1]->getTurn() ?>, <?= $sizes[2]->getTurn() ?>, <?= $sizes[3]->getTurn() ?>, <?= $sizes[4]->getTurn() ?>), M1PR, p1, turn</p>
        <p>R3 : DS, k to 3 sts. bef. the DS, M1L, k1, turn</p>
        <p>R4 : DS, p to 3 sts. bef. the DS, M1PR, p1, turn</p>
        <p>Repeat R3 and R4 <?= $sizes[0]->getTurnRepeat() ?> (<?= $sizes[1]->getTurnRepeat() ?>, <?= $sizes[2]->getTurnRepeat() ?>, <?= $sizes[3]->getTurnRepeat() ?>, <?= $sizes[4]->getTurnRepeat() ?>) times in total.</p>
        <p>=> <?= $sizes[0]->getTurnTotal() ?> (<?= $sizes[1]->getTurnTotal() ?>, <?= $sizes[2]->getTurnTotal() ?>, <?= $sizes[3]->getTurnTotal() ?>, <?= $sizes[4]->getTurnTotal() ?>) sts. for the sole</p>

        <li><h3>Heel Flap</h3></li>
        <p>R1 : DS, k<?= $sizes[0]->getFlapR1() ?> (<?= $sizes[1]->getFlapR1() ?>, <?= $sizes[2]->getFlapR1() ?>, <?= $sizes[3]->getFlapR1() ?>, <?= $sizes[4]->getFlapR1() ?>) knitting the DS as single st. by pricking in both “legs”, ssk, turn</p>
        <p>R2 : Sl.1 wyib, p<?= $sizes[0]->getFlapR2() ?> (<?= $sizes[1]->getFlapR2() ?>, <?= $sizes[2]->getFlapR2() ?>, <?= $sizes[3]->getFlapR2() ?>, <?= $sizes[4]->getFlapR2() ?>) knitting the DS as single st by pricking in both “legs”., p2tog, turn</p>
        <p>=> <?= $sizes[0]->getFlapSide() ?> (<?= $sizes[1]->getFlapSide() ?>, <?= $sizes[2]->getFlapSide() ?>, <?= $sizes[3]->getFlapSide() ?>, <?= $sizes[4]->getFlapSide() ?>) sts. not worked sts. on each side of the center and <?= $sizes[0]->getFlapCenter() ?> (<?= $sizes[1]->getFlapCenter() ?>, <?= $sizes[2]->getFlapCenter() ?>, <?= $sizes[3]->getFlapCenter() ?>, <?= $sizes[4]->getFlapCenter() ?>) sts. in the center.</p>
        <p>R3 : * Sl.1 wyib, k1 * repeat from * to * to 2 sts. bef. the hole, Sl.1 wyib, ssk, turn</p>
        <p>R4 : Sl.1 wyif, p to 1 st. bef. the hole, p2tog, turn</p>
        <p>Repeat R3 and R4 until 1 st. remains outside the hole on each side.</p>
        <p><strong>Cut the contrasting yarn and take the main yarn,</strong> k <strong>the contrasting stitches</strong> to 1 st. bef. the hole, ssk, DO NOT TURN, the sock is now worked in the round.</p>
        <p>K<?= $sizes[0]->getGeneral() ?> (<?= $sizes[1]->getGeneral() ?>, <?= $sizes[2]->getGeneral() ?>, <?= $sizes[3]->getGeneral() ?>, <?= $sizes[4]->getGeneral() ?>) in pattern, sm, k2tog, k to the end.</p>
    </ul>

    <h2 id="leg">Leg</h2>
    <p><?= $pattern->getLegStart() ?></p>
    <p>K<?= $sizes[0]->getTotal() ?> (<?= $sizes[1]->getTotal() ?>, <?= $sizes[2]->getTotal() ?>, <?= $sizes[3]->getTotal() ?>, <?= $sizes[4]->getTotal() ?>) in pattern.</p>
    <p>Knit as many rows as necessary to reach the desired height.
    <p><?= $pattern->getLegEnd() ?></p>

    <h2 id="cuff">Cuff</h2>
    <p><strong>Cut the main yarn and take the contrasting yarn.</strong></p>
    <p>R1 : * k1tbl, p1 * repeat from * to * to the end</p>
    <p>Repeat R1 12 times in total.</p>
    <p>Loosely bind off with <a href="https://maillesnam.com/tutoriel/jenys-surprisingly-stretchy-binf-off/">Jeny’s Surprisingly Bind Off</a>.</p>

    <h2 id="finishing">Finishing</h2>
    <p>Knit a second sock.</p>
    <p>Weave in all ends and wet block socks.</p>

</div>

<?php
    require __DIR__ . '/../main/abbreviations_en.tpl.php';
?>
