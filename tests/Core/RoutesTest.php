<?php declare(strict_types=1);

namespace Tests\Core;

use App\Controllers\SubPageController;
use App\Core\DI\Container;
use App\Core\PageContextProvider;
use App\Core\Routes;
use PHPUnit\Framework\TestCase;

final class RoutesTest extends TestCase
{
    private const TEMPLATE_ENV = [
        'WEB_ROOT' => '',
        'SITE_URL' => 'https://example.test',
        'SITE_URL_DISPLAY' => 'example.test',
        'SITE_EMAIL' => 'hello@example.test',
        'URL_CONTACT' => 'contact',
        'URL_SERVICES_SOLUTIONS' => 'solutions',
    ];

    protected function setUp(): void
    {
        foreach (self::TEMPLATE_ENV as $name => $value) {
            $_ENV[$name] = $value;
        }
    }

    protected function tearDown(): void
    {
        unset($_SERVER['REQUEST_METHOD']);
        unset($_SERVER['REQUEST_URI']);
        unset($_SERVER['HTTP_ACCEPT']);
        unset($_SERVER['HTTP_X_REQUESTED_WITH']);
        unset($_ENV['APP_ENV']);

        foreach (array_keys(self::TEMPLATE_ENV) as $name) {
            unset($_ENV[$name]);
        }
    }

    public function testGetDispatchMethodMapsHeadRequestsToGet(): void
    {
        $_SERVER['REQUEST_METHOD'] = 'HEAD';

        $routes = $this->newRoutesInstance();

        $this->assertSame('GET', $this->invokeMethod($routes, 'getDispatchMethod'));
    }

    public function testHandleDynamicPageOrNotFoundTreatsHeadRequestsAsDynamicPages(): void
    {
        $_SERVER['REQUEST_METHOD'] = 'HEAD';

        $subPageController = $this->createMock(SubPageController::class);
        $subPageController->expects($this->once())
            ->method('index');

        $container = $this->createMock(Container::class);
        $container->expects($this->once())
            ->method('get')
            ->with(SubPageController::class)
            ->willReturn($subPageController);

        $pageContextProvider = $this->createMock(PageContextProvider::class);
        $pageContextProvider->expects($this->once())
            ->method('resolve')
            ->with('about')
            ->willReturn(['content' => (object) []]);

        $routes = $this->newRoutesInstance();
        $this->setProperty($routes, 'container', $container);
        $this->setProperty($routes, 'pageContextProvider', $pageContextProvider);

        $this->invokeMethod($routes, 'handleDynamicPageOrNotFound', ['/about']);
    }

    public function testRespondSuppressesHeadResponseBodies(): void
    {
        $_SERVER['REQUEST_METHOD'] = 'HEAD';

        $routes = $this->newRoutesInstance();

        ob_start();
        $this->invokeMethod($routes, 'respond', [static function (): void {
            echo 'response body';
        }]);
        $output = ob_get_clean();

        $this->assertSame('', $output);
    }

    public function testHandleErrorDoesNotExposeExceptionMessages(): void
    {
        $_ENV['APP_ENV'] = 'prod';
        $_SERVER['REQUEST_METHOD'] = 'GET';
        $_SERVER['REQUEST_URI'] = '/broken-page';

        $routes = $this->newRoutesInstance();

        ob_start();
        $this->invokeMethod($routes, 'handleError', [new \RuntimeException('Sensitive failure details')]);
        $output = (string) ob_get_clean();

        $this->assertStringContainsString('Something went wrong', $output);
        $this->assertStringNotContainsString('Sensitive failure details', $output);
    }

    public function testHandleErrorShowsExceptionMessagesOutsideProduction(): void
    {
        $_ENV['APP_ENV'] = 'local';
        $_SERVER['REQUEST_METHOD'] = 'GET';
        $_SERVER['REQUEST_URI'] = '/broken-page';

        $routes = $this->newRoutesInstance();

        ob_start();
        $this->invokeMethod($routes, 'handleError', [new \RuntimeException('Sensitive failure details')]);
        $output = (string) ob_get_clean();

        $this->assertStringContainsString('Sensitive failure details', $output);
        $this->assertStringContainsString('RuntimeException', $output);
    }

    public function testHandleErrorReturnsJsonForNonGetRequests(): void
    {
        $_SERVER['REQUEST_METHOD'] = 'POST';

        $routes = $this->newRoutesInstance();

        ob_start();
        $this->invokeMethod($routes, 'handleError', [new \RuntimeException('Sensitive failure details')]);
        $output = (string) ob_get_clean();

        $this->assertJson($output);
        $this->assertSame(
            ['error' => 'Something went wrong. Please try again later.'],
            json_decode($output, true)
        );
    }

    private function newRoutesInstance(): Routes
    {
        $reflection = new \ReflectionClass(Routes::class);

        /** @var Routes $routes */
        $routes = $reflection->newInstanceWithoutConstructor();

        return $routes;
    }

    private function invokeMethod(object $object, string $method, array $arguments = []): mixed
    {
        $reflection = new \ReflectionMethod($object, $method);
        $reflection->setAccessible(true);

        return $reflection->invokeArgs($object, $arguments);
    }

    private function setProperty(object $object, string $property, mixed $value): void
    {
        $reflection = new \ReflectionProperty($object, $property);
        $reflection->setAccessible(true);
        $reflection->setValue($object, $value);
    }
}
