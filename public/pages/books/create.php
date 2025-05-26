<?php
require_once __DIR__ . '/../../../core/controllers/BookController.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller = new BookController();
    $controller->create($_POST, $_FILES);
    header('Location: index.php?page=books/list');
    exit;
}

$title = 'Add Book';
ob_start();
include __DIR__ . '/_form.php';
$content = ob_get_clean();
include __DIR__ . '/../layout.php';