<?php

require_once __DIR__ . '/../../repositories/BookRepository.php';
require_once __DIR__ . '/../../entities/Book.php';

// Use case to update a book by ID
class UpdateBookUseCase
{
    private BookRepository $repository;

    public function __construct(BookRepository $repository)
    {
        $this->repository = $repository;
    }

    public function execute(int $id, array $data): bool
    {
        $book = new Book(
            $data['code'],
            $data['title'],
            $data['author'],
            $data['publisher'],
            (int) $data['stock'],
            $data['cover_filename'] ?? null
        );

        return $this->repository->update($id, $book);
    }
}
