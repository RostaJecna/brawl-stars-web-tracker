<?php
session_start();

$uri = $_SERVER['REQUEST_URI'];

$parsedUrl = parse_url($uri);

$routes = [
    '/' => 'pages/index.php',
    '/404' => 'pages/404.php',
    '/brawlers' => 'pages/brawlers.php',
    '/api-handler' => 'pages/utils/api-handler.php',
    '/sign-up-handler' => 'pages/utils/sign-up-handler.php',
    '/log-in-handler' => 'pages/utils/log-in-handler.php',
    '/sign-out-handler' => 'pages/utils/sign-out-handler.php',
    '/not-found' => 'pages/utils/not-found.php',
    '/profile' => 'pages/profile.php',
    '/about-web' => 'pages/about-web.php'
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
