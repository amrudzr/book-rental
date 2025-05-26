<?php
require_once __DIR__ . '/../../../core/controllers/BookController.php';

$controller = new BookController();
$id = $_GET['id'] ?? null;
$book = $controller->show($id);

if (!$book) {
    echo "Book not found.";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->update($id, $_POST, $_FILES);
    header('Location: index.php?page=books/list');
    exit;
}

$title = 'Edit Book';
ob_start();
include __DIR__ . '/_form.php';
$content = ob_get_clean();
include __DIR__ . '/../layout.php';
