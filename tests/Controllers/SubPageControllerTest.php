<?php

declare(strict_types=1);

namespace Tests\Controllers;

use App\Controllers\SubPageController;
use App\Core\Contracts\ViewInterface;
use App\Core\Services\FormSubmissionService;
use PHPUnit\Framework\TestCase;

final class SubPageControllerTest extends TestCase
{
    public function testIndexRendersSubpageUsingInjectedView(): void
    {
        $view = $this->createMock(ViewInterface::class);
        $view->expects($this->once())
            ->method('render')
            ->with('subpage');

        $controller = new SubPageController($view, $this->createStub(FormSubmissionService::class));
        $controller->index();
    }

    public function testThankYouRendersBeforeSendingDeferredSubmissions(): void
    {
        $rendered = false;
        $view = $this->createMock(ViewInterface::class);
        $view->expects($this->once())
            ->method('render')
            ->with('thankYou')
            ->willReturnCallback(static function () use (&$rendered): void {
                $rendered = true;
            });

        $submissionService = $this->createMock(FormSubmissionService::class);
        $submissionService->expects($this->once())
            ->method('sendDeferredSubmissions')
            ->willReturnCallback(function () use (&$rendered): void {
                $this->assertTrue($rendered);
            });

        (new SubPageController($view, $submissionService))->thankYou();
    }
}
