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

require __DIR__ . '/public/index.php';