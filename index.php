<?php
session_start();

require_once __DIR__ . '/app/core/autoLoader.php';

Autoloader::register();


$controller = isset($_GET['controller']) ? $_GET['controller'] : 'home';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';


$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if (isset($_GET['controller'])) {
    $controllerName = ucfirst($_GET['controller']) . 'Controller';
    $controllerClass = "App\\Controllers\\{$controllerName}";
    
    if (class_exists($controllerClass)) {
        $controllerInstance = new $controllerClass();
        if (method_exists($controllerInstance, $action)) {
            $controllerInstance->$action();
            exit;
        }
    }
}

switch ($uri) {
  case '/boutique-en-ligne/':
  case '/boutique-en-ligne':

    $controller = new App\Controllers\HomeController();
    $controller->index();
    break;
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
      case '/boutique-en-ligne/profile/update':
    $controller = new App\Controllers\ProductController();
    $controller->update();
    break;
  default:
    header("HTTP/1.0 404 Not Found");
    echo "404 Not Found: The page you requested does not exist.";
    break;
}