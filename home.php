<?php
// templates/frontend/home.php
?>
<main class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <h1 class="mb-4"><?= $data['title']; ?></h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <?php foreach ($data['menuItems'] as $menuItem): ?>
                        <li class="breadcrumb-item">
                            <a href="<?= $menuItem->link; ?>"><?= htmlspecialchars($menuItem->title); ?></a>
                        </li>
                    <?php endforeach; ?>
                </ol>
            </nav>
        </div>
    </div>
</main>
