<?php

require_once __DIR__ . '/../../repositories/BookRepository.php';
require_once __DIR__ . '/../../entities/Book.php';

// Use case to create a new book
class CreateBookUseCase
{
    private BookRepository $repository;

    public function __construct(BookRepository $repository)
    {
        $this->repository = $repository;
    }

    public function execute(array $data): bool
    {
        $book = new Book(
            $data['code'],
            $data['title'],
            $data['author'],
            $data['publisher'],
            (int) $data['stock'],
            $data['cover_filename'] ?? null
        );

        return $this->repository->save($book);
    }
}
