<?php

require_once __DIR__ . '/../../repositories/BookRepository.php';

// Use case to list all books
class ListBooksUseCase
{
    private BookRepository $repository;

    public function __construct(BookRepository $repository)
    {
        $this->repository = $repository;
    }

    public function execute(): array
    {
        return $this->repository->findAll();
    }
}
