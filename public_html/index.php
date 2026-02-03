<?php 

declare(strict_types=1);

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require_once __DIR__ . '/../vendor/autoload.php';

use App\Core\Application;

// Create and run the application
$app = Application::getInstance();
$app->run();

// ini_set('display_errors', '1');
// ini_set('display_startup_errors', '1');
// error_reporting(E_ALL);

// session_start();

// require '../vendor/autoload.php';

// $router = require '../src/Routes/index.php';

?>