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
                    <td>17</td>
                    <td>6.5</td>
                    <td>32/34</td>
                    <td>1.5/3</td>
                    <td>13/2</td>
                </tr>
            <tr>
                <td>S</td>
                <td>19</td>
                <td>7.5</td>
                <td>35/37</td>
                <td>4/5.5</td>
                <td>2.5/4</td>
            </tr>
            <tr>
                <td>M</td>
                <td>21</td>
                <td>8.5</td>
                <td>38/40</td>
                <td>6.5/8</td>
                <td>5/6.5</td>
            </tr>
            <tr>
                <td>L</td>
                <td>23</td>
                <td>9</td>
                <td>41/43</td>
                <td>9/10.5 (Femme) 9.5 (Homme)</td>
                <td>7.5/9</td>
            </tr>
            <tr>
                <td>XL</td>
                <td>25</td>
                <td>9.5</td>
                <td>44/46</td>
                <td>10/11.5</td>
                <td>9.5/11</td>
            </tr>
        </tbody>
    </table>
</div>
