<?php

// Book entity representing the business object and its basic validation rules
class Book
{
    public ?int $id;
    public string $code;
    public string $title;
    public string $author;
    public string $publisher;
    public int $stock;
    public ?string $cover_filename;

    public function __construct(
        string $code,
        string $title,
        string $author,
        string $publisher,
        int $stock,
        ?string $cover_filename = null,
        ?int $id = null
    ) {
        // Assign values to properties
        $this->code = $code;
        $this->title = $title;
        $this->author = $author;
        $this->publisher = $publisher;
        $this->stock = $stock;
        $this->cover_filename = $cover_filename;
        $this->id = $id;    
    }

    // Optional: validate fields here if needed (e.g., throw exception if stock < 0)
}
