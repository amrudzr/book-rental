<?php
// Get active page value from URL
$page = $_GET['page'] ?? 'books/list';

// Separate URL parts (eg. 'books/list' → ['books', 'list'])
$segments = explode('/', $page);

// Change to capital and clean for display
$breadcrumbs = array_map(fn($seg) => ucfirst(str_replace('-', ' ', $seg)), $segments);
?>

<nav aria-label="breadcrumb" class="mb-4">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="?page=books/list">Home</a>
        </li>
        <?php foreach ($breadcrumbs as $i => $label): ?>
            <?php if ($i === array_key_last($breadcrumbs)): ?>
                <li class="breadcrumb-item active" aria-current="page"><?= $label ?></li>
            <?php else: ?>
                <li class="breadcrumb-item"><?= $label ?></li>
            <?php endif; ?>
        <?php endforeach; ?>
    </ol>
</nav>