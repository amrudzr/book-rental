<?php

require_once __DIR__ . '/BookRepository.php';
require_once __DIR__ . '/../entities/Book.php';
require_once __DIR__ . '/../../config/connection.php';

// Concrete implementation of BookRepository using MySQL and PDO
class MySQLBookRepository implements BookRepository
{
    private PDO $pdo;

    public function __construct()
    {
        $this->pdo = getConnection();
    }

    public function findAll(): array
    {
        $stmt = $this->pdo->query("SELECT * FROM books ORDER BY title ASC");
        return $this->hydrateMany($stmt->fetchAll());
    }

    public function findById(int $id): ?Book
    {
        $stmt = $this->pdo->prepare("SELECT * FROM books WHERE id = ?");
        $stmt->execute([$id]);
        $row = $stmt->fetch();
        return $row ? $this->hydrate($row) : null;
    }

    public function save(Book $book): bool
    {
        $stmt = $this->pdo->prepare(
            "INSERT INTO books (code, title, author, publisher, stock, cover_filename) 
             VALUES (?, ?, ?, ?, ?, ?)"
        );
        return $stmt->execute([
            $book->code,
            $book->title,
            $book->author,
            $book->publisher,
            $book->stock,
            $book->cover_filename
        ]);
    }

    public function update(int $id, Book $book): bool
    {
        $check = $this->pdo->prepare("SELECT cover_filename FROM books WHERE id = ?");
        $check->execute([$id]);
        $result = $check->fetch(PDO::FETCH_ASSOC);

        $oldCover = $result['cover_filename'];

        $stmt = $this->pdo->prepare(
            "UPDATE books SET code = ?, title = ?, author = ?, publisher = ?, stock = ?, cover_filename = ?
             WHERE id = ?"
        );
        $success = $stmt->execute([
            $book->code,
            $book->title,
            $book->author,
            $book->publisher,
            $book->stock,
            $book->cover_filename,
            $id
        ]);

        if ($success && !is_null($oldCover)) {
            $coverPath = __DIR__ . "/../../public/uploads/" . $oldCover;
            if (file_exists($coverPath)) {
                unlink($coverPath);
            }
        }

        return $success;
    }

    public function delete(int $id): bool
    {
        $cover = $this->pdo->prepare("SELECT cover_filename FROM books WHERE id = ?");
        $cover->execute([$id]);
        $coverResult = $cover->fetch(PDO::FETCH_ASSOC);

        if (!is_null($coverResult)) {
            $coverPath = __DIR__ . "/../../public/uploads/" . $coverResult['cover_filename'];
            unlink($coverPath);
        }

        $stmt = $this->pdo->prepare("DELETE FROM books WHERE id = ?");
        return $stmt->execute([$id]);
    }

    public function search(string $keyword): array
    {
        $stmt = $this->pdo->prepare("
            SELECT * FROM books 
            WHERE title LIKE ? OR author LIKE ? 
            ORDER BY id DESC
        ");
        $param = '%' . $keyword . '%';
        $stmt->execute([$param, $param]);
        return $this->hydrateMany($stmt->fetchAll());
    }

    // Convert raw DB row to Book entity
    private function hydrate(array $row): Book
    {
        return new Book(
            $row['code'],
            $row['title'],
            $row['author'],
            $row['publisher'],
            (int) $row['stock'],
            $row['cover_filename'] ?? null,
            (int) $row['id']
        );
    }

    // Convert multiple rows to Book entities
    private function hydrateMany(array $rows): array
    {
        return array_map([$this, 'hydrate'], $rows);
    }
}
