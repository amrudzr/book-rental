<?php
function getConnection(): PDO
{
    $host = 'localhost';
    $db   = 'book_rental';
    $user = 'root';
    $pass = '';
    $charset = 'utf8mb4';

    // Data Source Name: contains the database type, host, db name, and charset
    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";

    // PDO options for secure and predictable behavior
    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, // Throw exceptions on database errors (better for debugging)
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,       // Fetch results as associative arrays (e.g., $row['title'])
        PDO::ATTR_EMULATE_PREPARES   => false,                  // Use real prepared statements (safer and more accurate)
    ];

    try {
        // Attempt to create a new PDO connection with the given DSN and options
        return new PDO($dsn, $user, $pass, $options);
    } catch (PDOException $e) {
        // Stop the script and display an error message if the connection fails
        die('Database connection failed: ' . $e->getMessage());
    }
}
