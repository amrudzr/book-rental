<?php

require_once __DIR__ . '/../../config/connection.php';
require_once __DIR__ . '/../../core/entities/Book.php';

$pdo = getConnection();

$books = [
    new Book('BK001', 'Clean Code', 'Robert C. Martin', 'Prentice Hall', 5, 'clean-code.jpg'),
    new Book('BK002', 'The Pragmatic Programmer', 'Andy Hunt', 'Addison-Wesley', 3, 'pragmatic.jpg'),
    new Book('BK003', 'Refactoring', 'Martin Fowler', 'Addison-Wesley', 7, 'refactoring.jpg'),
    new Book('BK004', 'Domain-Driven Design', 'Eric Evans', 'Addison-Wesley', 4, 'ddd.jpg'),
];

$stmt = $pdo->prepare("
    INSERT INTO books (code, title, author, publisher, stock, cover_filename)
    VALUES (?, ?, ?, ?, ?, ?)
");

foreach ($books as $book) {
    $stmt->execute([
        $book->code,
        $book->title,
        $book->author,
        $book->publisher,
        $book->stock,
        $book->cover_filename
    ]);
}

echo "Book seeding complete.\n";
