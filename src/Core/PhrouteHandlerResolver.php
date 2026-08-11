<?php
declare(strict_types=1);

namespace App\Core;

use Psr\Container\ContainerInterface;
use Phroute\Phroute\HandlerResolverInterface;

class PhrouteHandlerResolver implements HandlerResolverInterface
{
    private ContainerInterface $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function resolve($handler)
    {
        // If handler is an array [Controller::class, 'method']
        if(is_array($handler) and is_string($handler[0]))
        {
            $handler[0] = $this->container->get($handler[0]);
        }
        return $handler;
    }
}
