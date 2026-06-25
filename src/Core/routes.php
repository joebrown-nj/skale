<?php
declare(strict_types=1);

namespace App\Core;

use App\Core\Http\JsonResponse;
use App\Core\Services\RequestBlocklistService;
use App\Core\Contracts\ViewInterface;
use App\Core\DI\Container;
use App\Middleware\AuthMiddleware;
use Phroute\Phroute\RouteCollector;
use Phroute\Phroute\Dispatcher;
use Phroute\Phroute\Exception\HttpRouteNotFoundException;

use App\Controllers\HomeController;
use App\Controllers\SolutionController;
use App\Controllers\BlogController;
use App\Controllers\ContactController;
use App\Controllers\LogController;
use App\Controllers\SubPageController;
use App\Controllers\MetaDataController;
use App\Controllers\EmailController;
use App\Controllers\GetStartedController;
use App\Controllers\PortfolioController;
use App\Controllers\LandingPageController;

class Routes
{
    private RouteCollector $router;
    private Dispatcher $dispatcher;
    private Container $container;
    private PageContextProvider $pageContextProvider;

    public function __construct()
    {
        $this->container = Application::getInstance()->getContainer();
        $this->pageContextProvider = $this->container->get(PageContextProvider::class);
        $this->router = new RouteCollector();
        $this->registerRoutes();
        $resolver = new PhrouteHandlerResolver($this->container);
        $this->dispatcher = new Dispatcher($this->router->getData(), $resolver);
    }

    private function registerRoutes(): void
    {
        $this->router->filter('auth', function() {
            return $this->container->get(AuthMiddleware::class)->handle();
        });

        // Public routes
        $this->router->get('/', [HomeController::class, 'index']);
        $this->router->get('/services', [SolutionController::class, 'redirectLegacyServicesIndex']);
        $this->router->get('/services/{slug}', [SolutionController::class, 'redirectLegacyServicesDetail']);
        $this->router->get('/'.$_ENV['URL_SERVICES_SOLUTIONS'], [SolutionController::class, 'index']);
        $this->router->get('/'.$_ENV['URL_SERVICES_SOLUTIONS'].'/{slug}', [SolutionController::class, 'getSolutionDetail']);
        $this->router->get('/blog', [BlogController::class, 'index']);
        $this->router->get('/blog/archive', [BlogController::class, 'archive']);
        $this->router->get('/blog/{date}/{slug}', [BlogController::class, 'getBlogDetail']);
        $this->router->get('/contact', [ContactController::class, 'index']);
        $this->router->get('/portfolio', [PortfolioController::class, 'index']);

        $this->router->get('/thank-you', [SubPageController::class, 'thankYou']);

        $this->router->get('/website-development', [LandingPageController::class, 'websiteDevelopment']);
        $this->router->get('/marketing', [LandingPageController::class, 'marketing']);
        $this->router->get('/automation', [LandingPageController::class, 'automation']);
        $this->router->post('/post-lead-form', [LandingPageController::class, 'postLeadForm']);

        $this->registerSegmentedGetRoutes('/meta-data', 3, [MetaDataController::class, 'index']);

        $this->router->post('/', [GetStartedController::class, 'postGetStarted']);
        $this->router->post('/contact-form', [ContactController::class, 'submit']);
        $this->router->post('/log-button-click', [LogController::class, 'logButtonClick']);
        $this->router->post('/email-list-signup', [EmailController::class, 'signUp']);
    }

    public function dispatch(): void
    {
        $requestPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) ?? '/';
        $requestBlocklistService = $this->container->get(RequestBlocklistService::class);

        $this->respond(function () use ($requestPath, $requestBlocklistService): void {
            $matchedRule = $requestBlocklistService->findMatchingRequestRule($_SERVER, $requestPath);

            if ($matchedRule !== null) {
                http_response_code(403);

                if ($this->expectsJsonResponse()) {
                    echo JsonResponse::error($requestBlocklistService->getPublicMessage($matchedRule));
                    return;
                }

                $this->container->get(ViewInterface::class)->render('error/403', [
                    'errorMessage' => $requestBlocklistService->getPublicMessage(
                        $matchedRule,
                        'This request has been blocked for security reasons.'
                    ),
                ]);

                return;
            }

            if ($requestPath !== '/' && str_ends_with($requestPath, '/')) {
                $normalizedPath = rtrim($requestPath, '/');
                $queryString = isset($_SERVER['QUERY_STRING']) && $_SERVER['QUERY_STRING'] !== ''
                    ? '?' . $_SERVER['QUERY_STRING']
                    : '';

                http_response_code(301);
                header('Location: ' . $normalizedPath . $queryString, true, 301);
                return;
            }

            try {
                $response = $this->dispatcher->dispatch(
                    $this->getDispatchMethod(),
                    $requestPath
                );

                if ($response !== null) {
                    echo $response;
                }
            } catch (HttpRouteNotFoundException $e) {
                $this->handleDynamicPageOrNotFound($requestPath);
            } catch (\Exception $e) {
                $this->handleError($e);
            }
        });
    }

    private function handleDynamicPageOrNotFound(string $requestPath): void
    {
        if ($this->isPageRequestMethod() && $this->isDynamicPage($requestPath)) {
            $this->container->get(SubPageController::class)->index();
            return;
        }

        $this->handleNotFound();
    }

    private function isDynamicPage(string $requestPath): bool
    {
        $normalizedPath = trim($requestPath, '/');

        if ($normalizedPath === '') {
            return false;
        }

        return $this->pageContextProvider->resolve($normalizedPath) !== null;
    }

    private function handleNotFound(): void
    {
        http_response_code(404);
        $this->container->get(ViewInterface::class)->render('error/404');
    }

    private function registerSegmentedGetRoutes(string $basePath, int $maxDepth, array $handler): void
    {
        $this->router->get($basePath.'/', $handler);

        $segments = [];

        for ($depth = 1; $depth <= $maxDepth; $depth++) {
            $segments[] = '{p'.$depth.'}';
            $this->router->get($basePath.'/'.implode('/', $segments), $handler);
        }
    }

    private function respond(callable $callback): void
    {
        if (! $this->isHeadRequest()) {
            $callback();
            return;
        }

        ob_start();

        try {
            $callback();
        } finally {
            ob_end_clean();
        }
    }

    private function getDispatchMethod(): string
    {
        return $this->isHeadRequest()
            ? 'GET'
            : strtoupper((string) ($_SERVER['REQUEST_METHOD'] ?? 'GET'));
    }

    private function isPageRequestMethod(): bool
    {
        return in_array(
            strtoupper((string) ($_SERVER['REQUEST_METHOD'] ?? 'GET')),
            ['GET', 'HEAD'],
            true
        );
    }

    private function isHeadRequest(): bool
    {
        return strtoupper((string) ($_SERVER['REQUEST_METHOD'] ?? 'GET')) === 'HEAD';
    }

    private function handleError(\Exception $e): void
    {
        echo $e->getMessage();
        http_response_code(500);
        $this->container->get(ViewInterface::class)->render('error/500');
    }

    private function expectsJsonResponse(): bool
    {
        $acceptHeader = strtolower((string) ($_SERVER['HTTP_ACCEPT'] ?? ''));
        $requestedWith = strtolower((string) ($_SERVER['HTTP_X_REQUESTED_WITH'] ?? ''));

        return ($_SERVER['REQUEST_METHOD'] ?? 'GET') !== 'GET'
            || str_contains($acceptHeader, 'application/json')
            || $requestedWith === 'xmlhttprequest';
    }
}
