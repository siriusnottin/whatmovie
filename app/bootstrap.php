<?php

require_once __DIR__ . '/vendor/autoload.php';

use Dotenv\Dotenv;
use App\Core\Router;
use App\Controllers\AuthController;
use App\Controllers\AccountController;

// Load environment variables
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

$router = new Router();
$authController = new AuthController();

$router->addRoute('POST', '/signin', [$authController, 'signin']);
$router->addRoute('POST', '/signup', [$authController, 'signup']);
$router->addRoute('POST', '/signout', [$authController, 'signout']);
$router->addRoute('GET', '/account', [new AccountController(), 'showProfile']);

// Dispatch the request
$router->dispatch($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);
