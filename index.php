<?php

require_once __DIR__ . '/app/core/autoLoader.php';

Autoloader::register();

use App\Controllers\HomeController;

$controller = new HomeController();
$controller->index();