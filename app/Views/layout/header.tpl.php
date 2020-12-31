<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Générateur de Chaussettes</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?= $assetsBaseUri ?>css/bootstrap.min.css">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Leckerli+One&family=Roboto:ital,wght@0,400;0,700;1,400&display=swap">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha256-eZrrJcwDc/3uDhsdt61sL2oOBY362qM3lon1gyExkL0=" crossorigin="anonymous" />
    <!-- Style -->
    <link rel="stylesheet" href="<?= $assetsBaseUri ?>css/style.css">
    <!-- Favicon -->
    <link rel="icon" href="<?= $assetsBaseUri ?>images/favicon.png" />
</head>
<body>
    <main >

    <div class="container">
    <header class="mb-3">
        <img class="img-fluid" src="<?= $assetsBaseUri ?>images/logo_header.png" alt="logo de mailles nam">
        <?php if (!empty($_SESSION['userObject'])) {
            require __DIR__ . '/../partials/nav.tpl.php';
        } ?>
    </header>
    </div>
