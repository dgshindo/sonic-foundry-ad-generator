<?php
declare(strict_types=1);

function getDatabase(): PDO
{
    static $database = null;

    if ($database instanceof PDO) {
        return $database;
    }

    $databasePath = __DIR__ . '/../storage/sonic_foundry_ads.sqlite';

    $database = new PDO('sqlite:' . $databasePath);

    $database->setAttribute(
        PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION
    );

    $database->setAttribute(
        PDO::ATTR_DEFAULT_FETCH_MODE,
        PDO::FETCH_ASSOC
    );

    $database->exec(
        '
        CREATE TABLE IF NOT EXISTS campaigns (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            product_name TEXT NOT NULL,
            description TEXT NOT NULL,
            audience TEXT NOT NULL,
            tone TEXT NOT NULL,
            platform TEXT NOT NULL,
            price TEXT,
            sales_url TEXT,
            campaign_json TEXT NOT NULL,
            created_at TEXT NOT NULL
        )
        '
    );

    return $database;
}