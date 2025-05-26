<?php

class FileUploader
{
    public static function upload(array $file, string $destinationDir): ?string
    {
        if ($file['error'] !== UPLOAD_ERR_OK) {
            return null;
        }

        $allowedTypes = ['image/jpeg', 'image/png'];
        $maxSize = 2 * 1024 * 1024; // 2MB

        if (!in_array($file['type'], $allowedTypes)) {
            return null;
        }

        if ($file['size'] > $maxSize) {
            return null;
        }

        $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
        $filename = uniqid('cover_', true) . '.' . $ext;
        $target = rtrim($destinationDir, '/') . '/' . $filename;

        if (move_uploaded_file($file['tmp_name'], $target)) {
            return $filename;
        }

        return null;
    }
}
