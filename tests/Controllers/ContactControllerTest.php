<?php

declare(strict_types=1);

namespace Tests\Controllers;

use App\Controllers\ContactController;
use App\Core\Contracts\ContactFormInterface;
use App\Core\Contracts\ViewInterface;
use App\Core\Services\FormSubmissionService;
use App\Core\Services\RequestBlocklistService;
use App\Models\ContactModel;
use App\Models\Entities\RequestBlockRuleEntity;
use PHPUnit\Framework\TestCase;

final class ContactControllerTest extends TestCase
{
    protected function tearDown(): void
    {
        $_POST = [];
        $_SERVER = [];
        http_response_code(200);
    }

    public function testSubmitReturnsBlockedResponseWhenSubmissionMatchesBlacklist(): void
    {
        $input = [
            'name' => 'Blocked User',
            'email' => 'blocked@example.com',
            'phone' => '5550100',
            'comment' => 'Spam message',
        ];

        $contactModel = $this->createMock(ContactModel::class);
        $contactModel->expects($this->never())->method('checkContactForm');
        $contactModel->expects($this->never())->method('processContactForm');

        $formSubmissionService = $this->createMock(FormSubmissionService::class);
        $formSubmissionService->expects($this->never())->method('deferContactSubmission');

        $requestBlocklistService = $this->createMock(RequestBlocklistService::class);
        $requestBlocklistService->expects($this->once())
            ->method('findMatchingSubmissionRule')
            ->with($input, $_SERVER)
            ->willReturn(
                (new RequestBlockRuleEntity())
                    ->setAttribute('email')
                    ->setMatchType('exact')
                    ->setRuleValue('blocked@example.com'),
            );

        $view = $this->createMock(ViewInterface::class);
        $view->expects($this->never())->method('getUser');

        $controller = new ContactController($contactModel, $formSubmissionService, $requestBlocklistService, $view);

        $this->assertSame('{"error":"Unable to process request."}', $controller->submit($input));
        $this->assertSame(403, http_response_code());
    }

    public function testSubmitValidatesSavesEmailsAndRedirectsThroughSharedFlow(): void
    {
        $input = [
            'form_type' => 'landing-page',
            'name' => 'Jane Doe',
            'email' => 'jane@example.com',
            'comment' => 'I need a new website.',
        ];
        $user = ['ipAddress' => '127.0.0.1'];

        $contactModel = $this->createMock(ContactFormInterface::class);
        $contactModel->expects($this->once())->method('validate')->with($input)->willReturn([]);
        $contactModel->expects($this->once())->method('save')->with($input)->willReturn(true);

        $formSubmissionService = $this->createMock(FormSubmissionService::class);
        $formSubmissionService->expects($this->once())
            ->method('deferContactSubmission')
            ->with($input, $user, $_SERVER);

        $requestBlocklistService = $this->createMock(RequestBlocklistService::class);
        $requestBlocklistService->expects($this->once())
            ->method('findMatchingSubmissionRule')
            ->with($input, $_SERVER)
            ->willReturn(null);

        $view = $this->createMock(ViewInterface::class);
        $view->expects($this->once())->method('getUser')->willReturn($user);

        $controller = new ContactController(
            $contactModel,
            $formSubmissionService,
            $requestBlocklistService,
            $view,
        );

        $this->assertSame(
            '{"success":{"redirect":"\/thank-you"}}',
            $controller->submit($input),
        );
    }

    public function testNewsletterSubmissionIsNormalizedForTheSharedContactRecord(): void
    {
        $rawInput = [
            'form_type' => 'newsletter',
            'email' => 'reader@example.com',
        ];
        $normalizedInput = [
            'form_type' => 'newsletter',
            'email' => 'reader@example.com',
            'name' => 'Newsletter Subscriber',
            'subscribe' => 1,
        ];

        $contactModel = $this->createMock(ContactFormInterface::class);
        $contactModel->expects($this->once())->method('validate')->with($normalizedInput)->willReturn([]);
        $contactModel->expects($this->once())->method('save')->with($normalizedInput)->willReturn(true);

        $formSubmissionService = $this->createMock(FormSubmissionService::class);
        $formSubmissionService->expects($this->once())
            ->method('deferContactSubmission')
            ->with($normalizedInput, null, $_SERVER);

        $requestBlocklistService = $this->createStub(RequestBlocklistService::class);
        $requestBlocklistService->method('findMatchingSubmissionRule')->willReturn(null);

        $view = $this->createStub(ViewInterface::class);
        $view->method('getUser')->willReturn(null);

        $controller = new ContactController(
            $contactModel,
            $formSubmissionService,
            $requestBlocklistService,
            $view,
        );

        $this->assertSame(
            '{"success":{"redirect":"\/thank-you"}}',
            $controller->submit($rawInput),
        );
    }
}
