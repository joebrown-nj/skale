<?php

use Symfony\Component\Dotenv\Dotenv;

$dotenv = new Dotenv();
$dotenv->load('../.env');
$dotenv->load('../'.strtoupper($_ENV['APP_ENV']).'.env');

use App\Controllers\HomeController;
use App\Controllers\AboutController;
use App\Controllers\ContactController;
use App\Controllers\ServiceController;
use App\Controllers\LogController;
use App\Controllers\OurProcessController;
use App\Controllers\PortfolioController;
use App\Controllers\SubPageController;
use App\Controllers\BlogController;
use App\Controllers\LeadController;
use App\Router;

$router = new Router();

$router->get('home', HomeController::class, 'index');
$router->get('blog', BlogController::class, 'index');
$router->get('blog/detail', BlogController::class, 'getBlogPost');
// $router->get('our-process', OurProcessController::class, 'index');
// $router->get('portfolio', PortfolioController::class, 'index');
// $router->get('email-template', HomeController::class, 'emailTemplate');
$router->get('unsubscribe', HomeController::class, 'unsubscribe');
// $router->get('home', HomeController::class, 'submit', 'POST');
$router->get('about', AboutController::class, 'index');
$router->get('contact', ContactController::class, 'index');
// $router->get('contact', ContactController::class, 'submit', 'POST');
$router->get('services', ServiceController::class, 'index');
$router->get('services/detail', ServiceController::class, 'detail');
$router->get('log-button-click', LogController::class, 'logButtonClick', 'POST');
$router->get('email-list-signup', LogController::class, 'emailListSignup', 'POST');
$router->get('contact-form', ContactController::class, 'submit', 'POST');
$router->get('privacy-policy', SubPageController::class, 'index');
$router->get('terms-of-service', SubPageController::class, 'index');

// lead gen page
$router->get('lead', LeadController::class, 'index');

$router->dispatch();