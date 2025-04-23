<?php

require_once __DIR__ . '/vendor/autoload.php';

use Dotenv\Dotenv;
use App\Core\Router;
use App\Controllers\AccountController;

// Load environment variables
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

$router = new Router();

// Define routes
$router->addRoute('POST', '/signin', [new AccountController(), 'signin']);

// Dispatch the request
$router->dispatch($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);
