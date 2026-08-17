<?php

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

use App\Core\Application;
use App\Core\Environment;
use App\Core\ErrorHandler;

Environment::boot(dirname(__DIR__));

ini_set('display_errors', '0');
ini_set('display_startup_errors', '0');
ini_set('log_errors', '1');
error_reporting(E_ALL);

ErrorHandler::register();

ob_start();

// Create and run the application
$app = Application::getInstance();
$app->run();

if (ob_get_level() > 0) {
    ob_end_flush();
}
