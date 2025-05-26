<?php

require_once __DIR__ . '/../repositories/MySQLBookRepository.php';
require_once __DIR__ . '/../usecases/books/ListBooksUseCase.php';
require_once __DIR__ . '/../usecases/books/SearchBooksUseCase.php';
require_once __DIR__ . '/../usecases/books/ShowBookUseCase.php';
require_once __DIR__ . '/../usecases/books/CreateBookUseCase.php';
require_once __DIR__ . '/../usecases/books/UpdateBookUseCase.php';
require_once __DIR__ . '/../usecases/books/DeleteBookUseCase.php';

require_once __DIR__ . '/../../services/FileUploader.php';
require_once __DIR__ . '/../../services/InputSanitizer.php';

class BookController
{
    private BookRepository $repository;

    public function __construct()
    {
        $this->repository = new MySQLBookRepository();
    }

    public function list(): array
    {
        $useCase = new ListBooksUseCase($this->repository);
        return $useCase->execute();
    }

    public function search(string $keyword): array
    {
        $useCase = new SearchBooksUseCase($this->repository);
        return $useCase->execute($keyword);
    }

    public function show(int $id): ?Book
    {
        $useCase = new ShowBookUseCase($this->repository);
        return $useCase->execute($id);
    }

    public function create(array $post, array $files): bool
    {
        $data = InputSanitizer::sanitize($post);
        $data['cover_filename'] = FileUploader::upload($files['cover'], __DIR__ . '/../../public/uploads');

        $useCase = new CreateBookUseCase($this->repository);
        return $useCase->execute($data);
    }

    public function update(int $id, array $post, array $files): bool
    {
        $data = InputSanitizer::sanitize($post);

        // Handle new upload only if provided
        if (isset($files['cover']) && $files['cover']['error'] === UPLOAD_ERR_OK) {
            $data['cover_filename'] = FileUploader::upload($files['cover'], __DIR__ . '/../../public/uploads');
        } else {
            $existing = $this->show($id);
            $data['cover_filename'] = $existing?->cover_filename ?? null;
        }

        $useCase = new UpdateBookUseCase($this->repository);
        return $useCase->execute($id, $data);
    }

    public function delete(int $id): bool
    {
        $useCase = new DeleteBookUseCase($this->repository);
        return $useCase->execute($id);
    }
}
