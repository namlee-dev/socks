<div class="container">
    <?php require __DIR__ . '/../partials/sizes.tpl.php' ?>
    <?php if ($lang === 'fr') : ?>
        <h1>Longueur par pointure</h1>
    <?php endif; ?>
    <?php if ($lang === 'en') : ?>
        <h1>Length by shoe size</h1>
    <?php endif; ?>
    <?php require __DIR__ . '/../partials/length.tpl.php' ?>
    <?php require __DIR__ . '/../partials/socks.tpl.php' ?>
</div>