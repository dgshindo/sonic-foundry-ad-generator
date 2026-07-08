<?php

$uri = urldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

if ($uri === '/generate' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    require __DIR__ . '/public/generate.php';
    exit;
}

$publicPath = __DIR__ . '/public' . $uri;

if ($uri !== '/' && file_exists($publicPath)) {
    return false;
}

if ($uri === '/campaign' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    require __DIR__ . '/public/campaign.php';
    exit;
}

if ($uri === '/history') {
    require __DIR__ . '/public/history.php';
    exit;
}

require __DIR__ . '/public/index.php';