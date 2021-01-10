<?php require __DIR__ . '/../partials/nav-admin.tpl.php'; ?>

<div class="container my-4">
    <a href="<?= $router->generate('pattern-add-en') ?>" class="btn btn-success float-right">Add</a>
    <h2>Patterns list</h2>
    <table class="table table-hover mt-4">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($patterns as $pattern): ?>
            <tr>
                <th scope="row"><?= $pattern->getId() ?></th>
                <td><?= $pattern->getName()?></td>
                <td class="text-right">
                    <a href="<?=  $router->generate('pattern-edit-en', ['id' => $pattern->getId()]) ?>" class="btn btn-sm btn-warning">
                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                    </a>
                    <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-danger dropdown-toggle"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-trash-o" aria-hidden="true"></i>
                        </button>
                        <div class="dropdown-menu">
                            <?php $token = Socks\Controllers\CoreController::createToken() ?>
                            <a class="dropdown-item" href="<?= $router->generate('pattern-delete-en', ['id' => $pattern->getId()]) ?>?token=<?= $token ?>">Oui, je veux supprimer</a>
                            <a class="dropdown-item" href="#" data-toggle="dropdown">Oups !</a>
                        </div>
                    </div>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
