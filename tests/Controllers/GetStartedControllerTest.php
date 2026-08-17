<?php

declare(strict_types=1);

namespace Tests\Controllers;

use App\Controllers\GetStartedController;
use App\Core\Contracts\ViewInterface;
use App\Core\Services\FormSubmissionService;
use App\Core\Services\RequestBlocklistService;
use App\Models\ContactModel;
use App\Models\GetStartedModel;
use PHPUnit\Framework\TestCase;

final class GetStartedControllerTest extends TestCase
{
    public function testPostGetStartedUsesDedicatedSubmissionHandler(): void
    {
        $input = [
            'name' => 'Jane Doe',
            'email' => 'jane@example.com',
            'phone' => '555-0100',
            'comment' => 'Need a better lead flow.',
        ];
        $expectedInput = $input;
        $expectedInput['comment'] = 'Get Started Form Submission - ' . $input['comment'];
        $user = ['country_name' => 'United States'];

        $formSubmissionService = $this->createMock(FormSubmissionService::class);
        $formSubmissionService->expects($this->once())
            ->method('handleGetStartedSubmission')
            ->with($expectedInput, $user, $_SERVER);
        $formSubmissionService->expects($this->never())
            ->method('handleContactSubmission');

        $requestBlocklistService = $this->createMock(RequestBlocklistService::class);
        $requestBlocklistService->expects($this->once())
            ->method('findMatchingSubmissionRule')
            ->with($expectedInput, $_SERVER)
            ->willReturn(null);

        $getStartedModel = $this->createMock(GetStartedModel::class);
        $getStartedModel->expects($this->once())
            ->method('checkForm')
            ->with($expectedInput)
            ->willReturn([]);

        $contactModel = $this->createMock(ContactModel::class);
        $contactModel->expects($this->once())
            ->method('processContactForm')
            ->with($expectedInput)
            ->willReturn(true);

        $view = $this->createMock(ViewInterface::class);
        $view->expects($this->once())
            ->method('getUser')
            ->willReturn($user);

        $controller = new GetStartedController($formSubmissionService, $requestBlocklistService, $getStartedModel, $contactModel, $view);

        $this->assertSame('{"success":{"redirect":"\/thank-you"}}', $controller->postGetStarted($input));
    }
}
