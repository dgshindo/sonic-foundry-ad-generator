<?php

function config(string $key, mixed $default = null): mixed
{
    static $values = null;

    if ($values === null) {
        $values = [];

        $envPath = __DIR__ . '/../.env';

        if (file_exists($envPath)) {
            foreach (file($envPath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) as $line) {
                if (str_starts_with(trim($line), '#') || !str_contains($line, '=')) {
                    continue;
                }

                [$envKey, $envValue] = explode('=', $line, 2);

                $values[trim($envKey)] = trim($envValue);
            }
        }
    }

    return $values[$key] ?? $default;
}
?>