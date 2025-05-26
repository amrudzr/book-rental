<?php
require_once __DIR__ . '/../../../core/controllers/BookController.php';

$controller = new BookController();
$keyword = $_GET['q'] ?? null;
$books = $keyword ? $controller->search($keyword) : $controller->list();

$title = 'Book List';
ob_start();
include __DIR__ . '/_list_view.php';
$content = ob_get_clean();
include __DIR__ . '/../layout.php';
