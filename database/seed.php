<?php
foreach (glob(__DIR__ . '/seeders/*.php') as $file) {
    echo "Seeding: $file\n";
    require $file;
}
