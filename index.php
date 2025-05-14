<?php
session_start();

require_once __DIR__ . '/app/core/autoLoader.php';
Autoloader::register();

use App\Controllers\HomeController;
use App\Controllers\AuthController;
use App\Controllers\ProfileController;
use App\Controllers\AdminController;
use App\Controllers\AdminProductController;

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Redirections simples
switch (true) {
  case $uri === '/boutique-en-ligne/' || $uri === '/boutique-en-ligne':
    header('Location: /boutique-en-ligne/login');
    exit;

  case $uri === '/boutique-en-ligne/home':
    (new HomeController())->index();
    break;

  case $uri === '/boutique-en-ligne/login':
    (new AuthController())->login();
    break;

  case $uri === '/boutique-en-ligne/logout':
    (new AuthController())->logout();
    break;

  case $uri === '/boutique-en-ligne/register':
    (new AuthController())->register();
    break;

  case $uri === '/boutique-en-ligne/profile':
    (new ProfileController())->show();
    break;

  case $uri === '/boutique-en-ligne/profile/update':
    (new ProfileController())->update();
    break;

  case $uri === '/boutique-en-ligne/admin/dashboard':
    (new AdminController())->dashboard();
    break;

  // CRUD Produits Admin
  case $uri === '/boutique-en-ligne/admin/products':
    (new AdminProductController())->index();
    break;

  case $uri === '/boutique-en-ligne/admin/products/create':
    (new AdminProductController())->create();
    break;

  case $uri === '/boutique-en-ligne/admin/products/store':
    (new AdminProductController())->store();
    break;

  case preg_match('#^/boutique-en-ligne/admin/products/edit/(\d+)$#', $uri, $matches):
    (new AdminProductController())->edit($matches[1]);
    break;

  case preg_match('#^/boutique-en-ligne/admin/products/update/(\d+)$#', $uri, $matches):
    (new AdminProductController())->update($matches[1]);
    break;

  case preg_match('#^/boutique-en-ligne/admin/products/delete/(\d+)$#', $uri, $matches):
    (new AdminProductController())->delete($matches[1]);
    break;

  default:
    http_response_code(404);
    echo "404 Not Found";
    break;
}
