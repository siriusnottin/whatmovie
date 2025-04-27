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

// Auth routes
$router->addRoute('GET', '/signin', function () {
  include __DIR__ . '/pages/account/signin.php';
});
$router->addRoute('GET', '/signup', function () {
  include __DIR__ . '/pages/account/signup.php';
});
$router->addRoute('GET', '/forgot-password', function () {
  include __DIR__ . '/pages/account/forgot-password.php';
});
$router->addRoute('POST', '/signin', [$authController, 'signin']);
$router->addRoute('POST', '/signup', [$authController, 'signup']);
$router->addRoute('POST', '/signout', [$authController, 'signout']);

// Account routes
$router->addRoute('GET', '/account', function () {
  include __DIR__ . '/pages/account/profile.php';
});

// Home route
$router->addRoute('GET', '/', function () {
  include __DIR__ . '/pages/home.php';
});

// Discover route
$router->addRoute('GET', '/discover', function () {
  include __DIR__ . '/pages/discover.php';
});

// Dispatch the request
$router->dispatch($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);
