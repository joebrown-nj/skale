<?php declare(strict_types=1);

namespace Tests\Controllers;

use App\Controllers\ContactController;
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
        $formSubmissionService->expects($this->never())->method('handleContactSubmission');

        $requestBlocklistService = $this->createMock(RequestBlocklistService::class);
        $requestBlocklistService->expects($this->once())
            ->method('findMatchingSubmissionRule')
            ->with($input, $_SERVER)
            ->willReturn(
                (new RequestBlockRuleEntity())
                    ->setAttribute('email')
                    ->setMatchType('exact')
                    ->setRuleValue('blocked@example.com')
            );

        $view = $this->createMock(ViewInterface::class);
        $view->expects($this->never())->method('getUser');

        $controller = new ContactController($contactModel, $formSubmissionService, $requestBlocklistService, $view);

        $this->assertSame('{"error":"Unable to process request."}', $controller->submit($input));
        $this->assertSame(403, http_response_code());
    }
}
