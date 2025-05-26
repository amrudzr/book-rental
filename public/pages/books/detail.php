<?php
require_once __DIR__ . '/../../../core/controllers/BookController.php';

$controller = new BookController();
$id = $_GET['id'] ?? null;
$book = $controller->show($id);

if (!$book) {
    echo "Book not found.";
    exit;
}

$title = 'Book Detail';
ob_start();
include __DIR__ . '/_detail_view.php';
$content = ob_get_clean();
include __DIR__ . '/../layout.php';
