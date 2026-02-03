<?php
declare(strict_types=1);

namespace App\Core;

use App\Core\DI\Container;
use App\Middleware\AuthMiddleware;
use Phroute\Phroute\RouteCollector;
use Phroute\Phroute\Dispatcher;
use Phroute\Phroute\Exception\HttpRouteNotFoundException;

use App\Controllers\HomeController;
// use App\Controllers\AuthController;
use App\Controllers\ServiceController;
use App\Controllers\BlogController;
use App\Controllers\ContactController;
use App\Controllers\LogController;
use App\Controllers\SubPageController;
use App\Controllers\MetaDataController;
use App\Controllers\EmailController;

class Routes
{
    private RouteCollector $router;
    private Dispatcher $dispatcher;
    private Container $container;

    public function __construct()
    {
        $this->container = Application::getInstance()->getContainer();
        $this->router = new RouteCollector();
        $this->registerRoutes();
        $resolver = new PhrouteHandlerResolver($this->container);
        $this->dispatcher = new Dispatcher($this->router->getData(), $resolver);
    }

    private function registerRoutes(): void
    {
        $this->router->filter('auth', function() {
            return (new AuthMiddleware)->handle();
        });

        // Public routes
        $this->router->get('/', [HomeController::class, 'index']);
        $this->router->get('/services', [ServiceController::class, 'index']);
        $this->router->get('/services/{slug}', [ServiceController::class, 'getServiceDetail']);
        $this->router->get('/blog', [BlogController::class, 'index']);
        $this->router->get('/blog/archive', [BlogController::class, 'archive']);
        $this->router->get('/blog/{date}/{slug}', [BlogController::class, 'getBlogDetail']);
        $this->router->get('/contact', [ContactController::class, 'index']);
        $this->router->post('/contact-form', [ContactController::class, 'submit']);
        $this->router->post('/log-button-click', [LogController::class, 'logButtonClick']);
        $this->router->post('/email-list-signup', [EmailController::class, 'signUp']);
        $this->router->get('/privacy-policy', [SubPageController::class, 'index']);
        $this->router->get('/terms-of-service', [SubPageController::class, 'index']);
        $this->router->get('/about', [SubPageController::class, 'index']);
        $this->router->get('/meta-data', [MetaDataController::class, 'index']);

        // Auth routes
        // $this->router->get('/register', [AuthController::class, 'showRegistrationForm']);
        // $this->router->post('/register', [AuthController::class, 'register']);
        // $this->router->get('/signin', [AuthController::class, 'showSignInForm']);
        // $this->router->post('/signin', [AuthController::class, 'signIn']);
        // $this->router->get('/logout', [AuthController::class, 'logout']);

        // Protected routes
        // $this->router->group(['before' => 'auth'], function($router) {
        //     $router->get('/blog/create', [BlogController::class, 'index']);
        //     $router->post('/blog/create', [BlogController::class, 'create']);
        //     $router->get('/blog/edit/{id:\d+}', [BlogController::class, 'edit']);
        //     $router->post('/blog/edit/{id:\d+}', [BlogController::class, 'update']);
        //     $router->get('/blog/delete/{id:\d+}', [BlogController::class, 'delete']);
        // });
    }

    public function dispatch(): void
    {
        try {
            $response = $this->dispatcher->dispatch(
                $_SERVER['REQUEST_METHOD'],
                parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)
            );
            echo $response;
        } catch (HttpRouteNotFoundException $e) {
            $this->handleNotFound();
        } catch (\Exception $e) {
            $this->handleError($e);
        }
    }

    private function handleNotFound(): void
    {
        http_response_code(404);
        echo (new View)->render('error/404');
        // $this->render('error/404');
    }

    private function handleError(\Exception $e): void
    {   echo $e->getMessage();
        http_response_code(500);
        echo (new View)->render('error/500');
        // $this->render('error/500');
    }
}