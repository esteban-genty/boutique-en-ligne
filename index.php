<?php
session_start();

require_once __DIR__ . '/app/core/autoLoader.php';

Autoloader::register();


$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

switch ($uri) {
  case '/boutique-en-ligne/':
  case '/boutique-en-ligne':
    header('Location: /boutique-en-ligne/login');
    exit;
  case '/boutique-en-ligne/home':
    $controller = new App\Controllers\HomeController();
    $controller->index();
    break;
  case '/boutique-en-ligne/login':
    $controller = new App\Controllers\AuthController();
    $controller->login();
    break;
  case '/boutique-en-ligne/logout':
    $controller = new App\Controllers\AuthController();
    $controller->logout();
    break;
  case '/boutique-en-ligne/register':
    $controller = new App\Controllers\AuthController();
    $controller->register();
    break;
  case '/boutique-en-ligne/profile':
    $controller = new App\Controllers\ProfileController();
    $controller->show();
    break;
  case '/boutique-en-ligne/profile/update':
    $controller = new App\Controllers\ProfileController();
    $controller->update();
    break;
  default:
    echo "404 Not Found";
    break;
}
