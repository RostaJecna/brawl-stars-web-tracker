<?php
session_start();

$uri = $_SERVER['REQUEST_URI'];

$parsedUrl = parse_url($uri);

$routes = [
    '/' => 'pages/index.php',
    '/brawlers' => 'pages/brawlers.php'
];

if ($parsedUrl && isset($parsedUrl['path'])) {
    $path = $parsedUrl['path'];
    if (array_key_exists($path, $routes)) {
        $key = array_search($routes[$path], $routes);
        $_SESSION["CURRENT_PAGE"] = $key;
        require_once __DIR__ . '/' . $routes[$path];
        exit();
    }
}

http_response_code(404);
require_once __DIR__ . '/pages/404.php';