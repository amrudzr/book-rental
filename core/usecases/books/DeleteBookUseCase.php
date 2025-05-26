<?php

require_once __DIR__ . '/../../repositories/BookRepository.php';

// Use case to delete a book by ID
class DeleteBookUseCase
{
    private BookRepository $repository;

    public function __construct(BookRepository $repository)
    {
        $this->repository = $repository;
    }

    public function execute(int $id): bool
    {
        return $this->repository->delete($id);
    }
}
