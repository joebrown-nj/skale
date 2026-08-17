<?php

declare(strict_types=1);

namespace Tests\Controllers;

use App\Controllers\SubPageController;
use App\Core\Contracts\ViewInterface;
use PHPUnit\Framework\TestCase;

final class SubPageControllerTest extends TestCase
{
    public function testIndexRendersSubpageUsingInjectedView(): void
    {
        $view = $this->createMock(ViewInterface::class);
        $view->expects($this->once())
            ->method('render')
            ->with('subpage');

        $controller = new SubPageController($view);
        $controller->index();
    }
}
