<div class="container">
    <h1>Correspondance des tailles</h1>
    <div class="table-responsive-lg">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Taille</th>
                    <th scope="col">Circonférence (cm)</th>
                    <th scope="col">Circonférence (in)</th>
                    <th scope="col">Pointure (FR)</th>
                    <th scope="col">Pointure (US)</th>
                    <th scope="col">Pointure (UK)</th>
                </tr>
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
        <h1>Vos chaussettes</h1>
        <form action="" method="POST">
            <div class="form-group">
                <label for="taille">Choisissez votre taille</label>
                <select class="form-control" name='taille'>
                    <?php  foreach ($tailleListe as $taille) : ?>
                    <option><?= $taille->getName() ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="motif">Choisissez votre motif</label>
                <select class="form-control" name='motif'>
                    <?php  foreach ($motifListe as $motif) : ?>
                    <option><?= $motif->getName() ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button type="submit" class="btn btn-info mt-4">Valider</button>
            <input type="hidden" name="token" value="<?= $token ?>">
            <a class="btn btn-outline-info mt-4" href="<?= $router->generate('gallery')?>">Voir les différents motifs</a>
        </form>
    </div>
</div>
