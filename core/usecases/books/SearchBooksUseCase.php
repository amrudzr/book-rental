<?php

require_once __DIR__ . '/../../repositories/BookRepository.php';

// Use case to handle searching books by title or author
class SearchBooksUseCase
{
    private BookRepository $repository;

    public function __construct(BookRepository $repository)
    {
        $this->repository = $repository;
    }

    public function execute(string $keyword): array
    {
        return $this->repository->search($keyword);
    }
}
