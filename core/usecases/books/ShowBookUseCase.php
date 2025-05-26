<?php

require_once __DIR__ . '/../../repositories/BookRepository.php';

// Use case to retrieve a book's detail by ID
class ShowBookUseCase
{
    private BookRepository $repository;

    public function __construct(BookRepository $repository)
    {
        $this->repository = $repository;
    }

    public function execute(int $id): ?Book
    {
        return $this->repository->findById($id);
    }
}
