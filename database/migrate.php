<?php
require_once __DIR__ . '/../config/connection.php';
$pdo = getConnection();

foreach (glob(__DIR__ . '/migrations/*.sql') as $file) {
    echo "Running: $file\n";
    $sql = file_get_contents($file);
    $pdo->exec($sql);
}
echo "Migration complete.\n";
