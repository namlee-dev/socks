<div class="container">
    <footer class="text-center border-info rounded p-3 mt-3">
        <?php
         if ($lang === 'en') : ?>
            <p>All rights reserved 2020 - <?= date('Y') ?> Mailles Nam / Pattern for personal use only</p>
            <p>It is prohibited to reproduce or sell this model as well as all knitted items from this model</p>
            <p>&#128386; info@maillesnam.com / On social networks : maillesnam</p>
            <p class="mb-0">Developed by <a class="dev-link" href="https://namlee.fr" target="_blank"> Nam Lee</a></p>
        <?php endif; ?>
        <?php if ($lang === 'fr') : ?>
            <p>Tous droits réservés 2020 - <?= date('Y') ?> Mailles Nam / Modèle pour usage personnel uniquement</p>
            <p>Il est interdit de reproduire ou de vendre ce modèle ainsi que tous les articles tricotés avec ce modèle</p>
            <p>&#128386; info@maillesnam.com / Sur les réseaux sociaux : maillesnam</p>
            <p class="mb-0">Développé par <a class="dev-link" href="https://namlee.fr" target="_blank"> Nam Lee</a></p>
        <?php endif; ?>
    </footer>
</div>
</main>

<!-- Bootstrap -->
<script src="<?= $assetsBaseUri ?>js/jquery.slim.min.js"></script>
<script src="<?= $assetsBaseUri ?>js/bootstrap.bundle.min.js"></script>
<!-- Cookies -->
<script type="text/javascript" charset="UTF-8" src="//cdn.cookie-script.com/s/d13546485991dc9e863c902fcc9c5bc9.js"></script>
</body>
</html>