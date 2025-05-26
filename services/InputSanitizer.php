<?php

class InputSanitizer
{
    public static function sanitize(array $data): array
    {
        return array_map('self::clean', $data);
    }

    public static function clean(string $value): string
    {
        return htmlspecialchars(trim($value), ENT_QUOTES, 'UTF-8');
    }
}
