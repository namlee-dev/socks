<div class="container">
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
    <p><?= $pattern->getYarn() ?></p>

    <h3>Needles</h3>
    <p><?= $pattern->getNeedles() ?></p>

    <h3>Gauge</h3>
    <p><?= $pattern->getGauge() ?></p>

    <h3>Material</h3>
    <p><?= $pattern->getMaterial() ?></p>

    <h3>Note</h3>
    <p>The instructions for toe, heel and rib in contrasting color are shown in bold.</p>

    <h2 id="cast-on">Cast-on</h2>
    <p>With the <a href="https://maillesnam.com/tutoriel/judys-magic-cast-on/">Judy's Magic Cast On</a>, cast on <?= $size->getCaston() ?> sts. on each needle in main color <strong>or in contrasting color</strong>.</p>
    <p>=> <?= $size->getCastonTotal() ?> sts.</p>

    <h2 id="toe">Toe</h2>
    <p>Set-up row : pm for the beginning of the row, k<?= $size->getCaston() ?>, pm for the beginning of the sole, k<?= $size->getCaston() ?>.</p>
    <p>R1 : * k1, yo, k to 1 st. bef. the end of the needle, yo, k1, sm *, repeat from * to *</p>
    <p>R2 : * k1, k1tbl, k to 2 st. bef. the end of the needle, k1tbl, k1, sm *, repeat from * to *</p>
    <p>Repeat R1 and R2 <?= $size->getToeRepeat() ?> times in total.</p>
    <p>=> <?= $size->getTotal() ?> sts.</p>

    <h2 id="foot">Foot</h2>
    <p><strong>Cut the contrasting yarn and take the main yarn.</strong></p>
    <p>k<?= $size->getGeneral() ?> in pattern, sm, k<?= $size->getGeneral() ?>.</p>
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
        <p>R1 : k<?= $size->getGeneral() ?> in pattern, sm, k1, M1L, k to 1 st. bef. the marker, M1R, k1</p>
        <p>R2 : k<?= $size->getGeneral() ?> in pattern, sm, k to the end</p>
        <p>Repeat R1 and R2 <?= $size->getGussetRepeat() ?> times in total.</p>
        <p>=> <?= $size->getGussetSole() ?> sts. for the sole, <?= $size->getGussetTotal() ?> sts. in total</p>

        <li><h3>Heel turn</h3></li>
        <p>Knitted back and forth with German Short Rows.</p>
        <p>R1 : k<?= $size->getGeneral() ?> in pattern, sm, k<?= $size->getTurnR1Principal() ?>, M1L, k1, turn</p>
        <p><strong>OR k<?= $size->getGeneral() ?> in pattern, sm, leave the main yarn without cutting it, sl. <?= $size->getTurnR1Contrasting() ?>, take the contrasting yarn, k<?= $size->getTurn() ?>, M1L, k1, turn</strong></p>
        <p>R2 : DS, p<?= $size->getTurn() ?>, M1PR, p1, turn</p>
        <p>R3 : DS, k to 3 sts. bef. the DS, M1L, k1, turn</p>
        <p>R4 : DS, p to 3 sts. bef. the DS, M1PR, p1, turn</p>
        <p>Repeat R3 and R4 <?= $size->getTurnRepeat() ?> times in total.</p>
        <p>=> <?= $size->getTurnTotal() ?> sts. for the sole</p>

        <li><h3>Heel Flap</h3></li>
        <p>R1 : DS, k<?= $size->getFlapR1() ?> knitting the DS as single st. by pricking in both “legs”, ssk, turn</p>
        <p>R2 : Sl.1 wyif, p<?= $size->getFlapR2() ?> knitting the DS as single st by pricking in both “legs”., p2tog, turn</p>
        <p>=> <?= $size->getFlapSide() ?> sts. not worked sts. on each side of the center and <?= $size->getFlapCenter() ?> sts. in the center.</p>
        <p>R3 : * Sl.1 wyib, k1 * repeat from * to * to 2 sts. bef. the hole, Sl.1 wyib, ssk, turn</p>
        <p>R4 : Sl.1 wyif, p to 1 st. bef. the hole, p2tog, turn</p>
        <p>Repeat R3 and R4 until 1 st. remains outside the hole on each side.</p>
        <p><strong>Cut the contrasting yarn and take the main yarn,</strong> k <strong>the contrasting stitches</strong> 1 st. bef. the hole, ssk, DO NOT TURN, the
            sock is now worked in the round.</p>
        <p>K<?= $size->getGeneral() ?> in pattern, sm, k2tog, k to the end.</p>
    </ul>

    <h2 id="leg">Leg</h2>
    <p><?= $pattern->getLegStart() ?></p>
    <p>K<?= $size->getTotal() ?> in pattern.</p>
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

    <a href="#summary">Back to summary</a>

</div>