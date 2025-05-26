<?php
require_once __DIR__ . '/../../../core/controllers/BookController.php';

$id = $_GET['id'] ?? null;
$controller = new BookController();

if ($id) {
    $controller->delete($id);
}

header('Location: index.php?page=books/list');
exit;
