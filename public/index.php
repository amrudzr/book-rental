<?php

// Path to pages folder
$pagesDir = __DIR__ . '/pages';

// Get page value from parameter
$page = $_GET['page'] ?? 'books/list';

// Validation: only safe characters
if (!preg_match('/^[a-zA-Z0-9_\/-]+$/', $page)) {
    http_response_code(400);
    echo "Invalid page format.";
    exit;
}

// Form the path to the target file
$pageFile = $pagesDir . '/' . $page . '.php';

// Run file if exists
if (file_exists($pageFile)) {
    require $pageFile;
} else {
    http_response_code(404);
    echo "Page not found.";
}
