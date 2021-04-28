<div class="table-responsive-lg">
<?php if ($lang === 'fr') : ?>
<h1>Correspondance des tailles</h1>
<p>Choisissez la taille sur base de la circonférence du pied, avec une aisance négative d'approximativement 2,5 cm. Par exemple, si la plante de votre pied mesure 22,5 cm de circonférence, vous devriez tricoter la taille M, qui a une circonférence finale de 20,5 cm.</p>
<?php endif; ?>
<?php if ($lang === 'en') : ?>
<h1>Matching sizes</h1>
<p>Choose size based on foot circumference, allowing approximately 1”/2.5cm of negative ease. For example, if the ball of your foot measures 9”/22.5cm in circumference, you should knit size M which has an 8”/20.5cm finished foot circumference.</p>
<?php endif; ?>
    <table class="table">
        <thead>
        <?php if ($lang === 'fr') : ?>
            <tr>
                <th scope="col">Taille</th>
                <th scope="col">Circonférence (cm)</th>
                <th scope="col">Circonférence (in)</th>
            </tr>
        <?php endif; ?>
        <?php if ($lang === 'en') : ?>
            <tr>
                <th scope="col">Size</th>
                <th scope="col">Circumference (cm)</th>
                <th scope="col">Circumference (in)</th>
            </tr>
        <?php endif; ?>
        </thead>
        <tbody>
            <tr>
                <td>XS</td>
                <td>15,5</td>
                <td>6</td>
            </tr>
            <tr>
                <td>S</td>
                <td>17,5</td>
                <td>7</td>
            </tr>
            <tr>
                <td>M</td>
                <td>20,5</td>
                <td>8</td>
            </tr>
            <tr>
                <td>L</td>
                <td>23,0</td>
                <td>9</td>
            </tr>
            <tr>
                <td>XL</td>
                <td>25,5</td>
                <td>10</td>
            </tr>
        </tbody>
    </table>
</div>
