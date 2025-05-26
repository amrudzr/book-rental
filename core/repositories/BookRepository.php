<?php

require_once __DIR__ . '/../entities/Book.php';

// Interface for data persistence abstraction related to Book entity
interface BookRepository
{
    public function findAll(): array;
    public function findById(int $id): ?Book;
    public function save(Book $book): bool;
    public function update(int $id, Book $book): bool;
    public function delete(int $id): bool;

    public function search(string $keyword): array; // Search books by title or author
}
