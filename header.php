<?php
// templates/frontend/partials/header.php
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($data['title']) ? $data['title'] : 'Unimani CMS'; ?></title>
    <link href="/bellkuhlo/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/bellkuhlo/templates/frontend/css/style.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="/">Unimani CMS</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                <?php if (isset($data['menuItems'])) : ?>
                    <?php foreach ($data['menuItems'] as $menuItem) : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="/<?= $menuItem->slug ?>"><?= $menuItem->title ?></a>
                        </li>
                    <?php endforeach; ?>
                <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>
