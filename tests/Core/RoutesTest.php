<?php declare(strict_types=1);

namespace Tests\Core;

use App\Controllers\SubPageController;
use App\Core\DI\Container;
use App\Core\PageContextProvider;
use App\Core\Routes;
use PHPUnit\Framework\TestCase;

final class RoutesTest extends TestCase
{
    protected function tearDown(): void
    {
        unset($_SERVER['REQUEST_METHOD']);
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
