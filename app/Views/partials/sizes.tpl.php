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
                <th scope="col">Pointure (FR)</th>
                <th scope="col">Pointure (US)</th>
                <th scope="col">Pointure (UK)</th>
            </tr>
        <?php endif; ?>
        <?php if ($lang === 'en') : ?>
            <tr>
                <th scope="col">Size</th>
                <th scope="col">Circumference (cm)</th>
                <th scope="col">Circumference (in)</th>
                <th scope="col">Shoe size (FR)</th>
                <th scope="col">Shoe size (US)</th>
                <th scope="col">Shoe size (UK)</th>
            </tr>
        <?php endif; ?>
        </thead>
        <tbody>
            <tr>
                    <td>XS</td>
                    <td>21/22.1</td>
                    <td>8.27/8.66</td>
                    <td>34/36</td>
                    <td>3.5-5</td>
                    <td>3/3.5</td>
                </tr>
            <tr>
                <td>S</td>
                <td>22.4/23.3</td>
                <td>8.66/9.06</td>
                <td>37/39</td>
                <td>5/6.5</td>
                <td>4.5/6</td>
            </tr>
            <tr>
                <td>M</td>
                <td>23.7/24.1</td>
                <td>9.06/9.45</td>
                <td>40/41</td>
                <td>7/8</td>
                <td>6.5/7.5</td>
            </tr>
            <tr>
                <td>L</td>
                <td>24.5/25.3</td>
                <td>9.45/9.84</td>
                <td>42/44</td>
                <td>8.5/10</td>
                <td>8/9.5</td>
            </tr>
            <tr>
                <td>XL</td>
                <td>25.7/26.1</td>
                <td>9.84/10.24</td>
                <td>45/46</td>
                <td>10.5/11.5</td>
                <td>10/11</td>
            </tr>
        </tbody>
    </table>
</div>
