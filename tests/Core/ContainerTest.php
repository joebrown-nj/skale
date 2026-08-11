<?php declare(strict_types=1);

namespace Tests\Core;

use DI\ContainerBuilder;
use DI\DependencyException;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\ContainerInterface;

final class ContainerTest extends TestCase
{
    private ContainerInterface $container;

    protected function setUp(): void
    {
        $this->container = (new ContainerBuilder())->build();
    }

    public function testResolvedServicesAreShared(): void
    {
        $this->assertSame(
            $this->container->get(Dependency::class),
            $this->container->get(Dependency::class),
        );
    }

    public function testOptionalAndDefaultArgumentsArePreserved(): void
    {
        $service = $this->container->get(ServiceWithDefaults::class);

        $this->assertSame('fallback', $service->name);
        $this->assertNull($service->dependency);
    }

    #[DataProvider('unresolvableServices')]
    public function testUnresolvableArgumentsProduceContainerExceptions(string $service): void
    {
        $this->expectException(ContainerExceptionInterface::class);
        $this->expectExceptionMessage('Parameter');

        $this->container->get($service);
    }

    public static function unresolvableServices(): iterable
    {
        yield 'untyped argument' => [ServiceWithUntypedArgument::class];
        yield 'builtin argument' => [ServiceWithBuiltinArgument::class];
        yield 'union argument' => [ServiceWithUnionArgument::class];
    }

    public function testCircularDependenciesProduceAContainerException(): void
    {
        $this->expectException(DependencyException::class);
        $this->expectExceptionMessage('Circular dependency detected');

        $this->container->get(CircularA::class);
    }
}

final class Dependency {}

final class ServiceWithDefaults
{
    public function __construct(
        public string $name = 'fallback',
        public ?Dependency $dependency = null,
    ) {}
}

final class ServiceWithUntypedArgument
{
    public function __construct(public $value) {}
}

final class ServiceWithBuiltinArgument
{
    public function __construct(public string $value) {}
}

final class ServiceWithUnionArgument
{
    public function __construct(public Dependency|string $value) {}
}

final class CircularA
{
    public function __construct(public CircularB $dependency) {}
}

final class CircularB
{
    public function __construct(public CircularA $dependency) {}
}
