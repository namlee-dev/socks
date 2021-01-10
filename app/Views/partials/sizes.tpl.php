<div class="table-responsive-lg">
<?php if ($lang === 'fr') : ?>
<h1>Correspondance des tailles</h1>
<?php endif; ?>
<?php if ($lang === 'en') : ?>
<h1>Matching sizes</h1>
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
                <td>19</td>
                <td>7.5</td>
            </tr>
            <tr>
                <td>S</td>
                <td>20.5</td>
                <td>8</td>
            </tr>
            <tr>
                <td>M</td>
                <td>21.5</td>
                <td>8.5</td>
            </tr>
            <tr>
                <td>L</td>
                <td>22.5</td>
                <td>9</td>
            </tr>
            <tr>
                <td>XL</td>
                <td>23.5</td>
                <td>9.25</td>
            </tr>
        </tbody>
    </table>
</div>
