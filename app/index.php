<?php

// this is the entry point of the application

use Dotenv\Dotenv;

define('BASE_PATH', __DIR__);
define('MODE_DEV', '%MODE%' === 'development');

define('APP_DIR', BASE_PATH.'/app');

// Load Composer's autoloader
define('VENDOR_PATH', BASE_PATH.'/vendor');
require_once VENDOR_PATH.'/autoload.php';


if (class_exists('Dotenv\Dotenv') && file_exists(BASE_PATH . '/.env')) {
    $dotenv = Dotenv::createImmutable(BASE_PATH);
    $dotenv->load();
}

require_once BASE_PATH.'/configs/env.php';

echo 'hello world';
