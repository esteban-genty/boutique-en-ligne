<?php
session_start();
require_once __DIR__ . '/app/core/Autoloader.php';

Autoloader::register();


if (isset($_GET['controller']) && isset($_GET['action'])) {
    $controllerName = ucfirst(strtolower($_GET['controller'])) . 'Controller';
    $actionName = $_GET['action'];

    $controllerClass = "App\\Controllers\\$controllerName";

    if (class_exists($controllerClass)) {
        $controller = new $controllerClass();

        if (method_exists($controller, $actionName)) {
       
            $controller->$actionName();
            exit;
        } else {
            http_response_code(404);
            echo "Erreur 404 : Méthode '$actionName' non trouvée dans $controllerClass.";
            exit;
        }
    } else {
        http_response_code(404);
        echo "Erreur 404 : Contrôleur '$controllerClass' introuvable.";
        exit;
    }
}


$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

switch ($uri) {
    case '/boutique-en-ligne/':
    case '/boutique-en-ligne':
        $controller = new App\Controllers\HomeController();
        $controller->index();
        break;

    case '/boutique-en-ligne/products':
        $controller = new App\Controllers\ProductController();
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
        http_response_code(404);
        echo "404 Not Found: The page you requested does not exist.";
        break;
}
