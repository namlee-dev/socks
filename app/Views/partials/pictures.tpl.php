<?php if ($lang === 'fr') : ?>
<h1>Galerie</h1>
<?php endif; ?>

<?php if ($lang === 'en') : ?>
<h1>Gallery</h1>
<?php endif; ?>

<div class="d-flex justify-content-between flex-wrap">

    <div class="card border-info my-4" style="width: 20rem;">
        <img src="<?= $assetsBaseUri ?>images/gallery/BTW.png" class="card-img-top" alt="Between Two Ferns">
        <div class="card-body text-center">
            <h5 class="card-title">Between Two Ferns</h5>
            <p>Fil / Yarn : Félicette - <a target="_blank" href="https://lechatquitricote-shop.com/">Le Chat Qui Tricote</a></p>
            <p>75% merino - 25% nylon - 5% stellina</p>
            <p>Coloris / Color : Olive</p>
            <p>Taille / Size : M</p>
        </div>
    </div>

    <div class="card border-info my-4" style="width: 20rem;">
        <img src="<?= $assetsBaseUri ?>images/gallery/VFV.png" class="card-img-top" alt="V For Vendetta">
        <div class="card-body text-center">
            <h5 class="card-title">V For Vendetta</h5>
            <p>Fil / Yarn : Figaro - <a target="_blank" href="https://lechatquitricote-shop.com/">Le Chat Qui Tricote</a></p>
            <p>75% merino - 20% yak - 10% nylon</p>
            <p>Coloris / Color : Paon</p>
            <p>Taille / Size : M</p>
        </div>
    </div>

</div>