<?php

require_once __DIR__ . '/app/core/autoLoader.php';

Autoloader::register();

use App\Controllers\HomeController;

$controller = new HomeController();
$controller->index();
session_start();
require_once 'app/controllers/AuthController.php';

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

switch ($uri) {
  case '/boutique-en-ligne/':
  case '/boutique-en-ligne':
    header('Location: /boutique-en-ligne/login');
    exit;
  case '/boutique-en-ligne/login':
    $controller = new AuthController();
    $controller->login();
    break;
  case '/boutique-en-ligne/logout':
    $controller = new AuthController();
    $controller->logout();
    break;
  case '/boutique-en-ligne/register':
    $controller = new AuthController();
    $controller->register();
    break;

  default:
    echo "404 Not Found";
    break;
}
