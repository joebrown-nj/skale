<?php

declare(strict_types=1);

namespace Tests\Controllers;

use App\Controllers\EmailController;
use App\Core\Contracts\EmailServiceInterface;
use App\Core\Contracts\EmailTemplateRendererInterface;
use App\Core\Contracts\ViewInterface;
use App\Core\Services\RequestBlocklistService;
use App\Models\Entities\RequestBlockRuleEntity;
use PHPUnit\Framework\TestCase;

final class EmailControllerTest extends TestCase
{
    protected function tearDown(): void
    {
        $_POST = [];
        $_SERVER = [];
        http_response_code(200);
    }

    public function testEmailTemplateUsesIsolatedDiagnosticDelivery(): void
    {
        $_ENV['CONTACT_FORM_MY_EMAIL'] = 'admin@example.com';
        $emailModel = $this->createMock(EmailServiceInterface::class);
        $emailModel->expects($this->never())->method('sendEmail');
        $emailModel->expects($this->once())
            ->method('sendTestEmail')
            ->with('admin@example.com', 'SkaleUp SMTP diagnostic', '<p>Test</p>')
            ->willReturn(true);
        $emailModel->expects($this->never())->method('getLastSendError');

        $renderer = $this->createMock(EmailTemplateRendererInterface::class);
        $renderer->expects($this->once())->method('render')->willReturn('<p>Test</p>');

        $controller = new EmailController(
            $emailModel,
            $this->createStub(RequestBlocklistService::class),
            $this->createStub(ViewInterface::class),
            $renderer,
        );

        $this->assertSame(
            'Test email sent successfully. Normal application email remains disabled.',
            $controller->emailTemplate(),
        );
    }

    public function testEmailTemplateReturnsDiagnosticTransportError(): void
    {
        $_ENV['CONTACT_FORM_MY_EMAIL'] = 'admin@example.com';
        $emailModel = $this->createMock(EmailServiceInterface::class);
        $emailModel->expects($this->never())->method('sendEmail');
        $emailModel->expects($this->once())->method('sendTestEmail')->willReturn(false);
        $emailModel->expects($this->once())
            ->method('getLastSendError')
            ->willReturn('SMTP relay:25 timed out');

        $controller = new EmailController(
            $emailModel,
            $this->createStub(RequestBlocklistService::class),
            $this->createStub(ViewInterface::class),
            $this->createStub(EmailTemplateRendererInterface::class),
        );

        $this->assertSame('Test email failed: SMTP relay:25 timed out', $controller->emailTemplate());
        $this->assertSame(502, http_response_code());
    }

    public function testSignUpReturnsErrorForInvalidEmail(): void
    {
        $_POST['email'] = 'not-an-email';

        $emailModel = $this->createMock(EmailServiceInterface::class);
        $emailModel->expects($this->once())
            ->method('validateEmail')
            ->with('not-an-email')
            ->willReturn(false);

        $requestBlocklistService = $this->createMock(RequestBlocklistService::class);
        $requestBlocklistService->expects($this->once())
            ->method('findMatchingSubmissionRule')
            ->with($_POST, $_SERVER)
            ->willReturn(null);

        $view = $this->createMock(ViewInterface::class);
        $view->expects($this->never())
            ->method('getUser');

        $controller = new EmailController($emailModel, $requestBlocklistService, $view, $this->createStub(EmailTemplateRendererInterface::class));

        $this->assertSame(
            '{"error":["A valid email is required"]}',
            $controller->signUp(),
        );
    }

    public function testSignUpReturnsErrorWhenEmailAlreadyExists(): void
    {
        $_POST['email'] = 'user@example.com';

        $emailModel = $this->createMock(EmailServiceInterface::class);
        $emailModel->expects($this->once())
            ->method('validateEmail')
            ->with('user@example.com')
            ->willReturn(true);
        $emailModel->expects($this->once())
            ->method('checkIfEmailIsOnList')
            ->with('user@example.com')
            ->willReturn(true);
        $emailModel->expects($this->never())
            ->method('emailListSignup');

        $requestBlocklistService = $this->createMock(RequestBlocklistService::class);
        $requestBlocklistService->expects($this->once())
            ->method('findMatchingSubmissionRule')
            ->with($_POST, $_SERVER)
            ->willReturn(null);

        $view = $this->createMock(ViewInterface::class);
        $view->expects($this->never())
            ->method('getUser');

        $controller = new EmailController($emailModel, $requestBlocklistService, $view, $this->createStub(EmailTemplateRendererInterface::class));

        $this->assertSame(
            '{"error":"You are already on the list"}',
            $controller->signUp(),
        );
    }

    public function testSignUpUsesInjectedViewUserDataForSuccessfulSignup(): void
    {
        $_POST['email'] = 'user@example.com';
        $user = ['country_name' => 'United States'];

        $emailModel = $this->createMock(EmailServiceInterface::class);
        $emailModel->expects($this->once())
            ->method('validateEmail')
            ->with('user@example.com')
            ->willReturn(true);
        $emailModel->expects($this->once())
            ->method('checkIfEmailIsOnList')
            ->with('user@example.com')
            ->willReturn(false);
        $emailModel->expects($this->once())
            ->method('emailListSignup')
            ->with($_POST, $user)
            ->willReturn(true);

        $requestBlocklistService = $this->createMock(RequestBlocklistService::class);
        $requestBlocklistService->expects($this->once())
            ->method('findMatchingSubmissionRule')
            ->with($_POST, $_SERVER)
            ->willReturn(null);

        $view = $this->createMock(ViewInterface::class);
        $view->expects($this->once())
            ->method('getUser')
            ->willReturn($user);

        $controller = new EmailController($emailModel, $requestBlocklistService, $view, $this->createStub(EmailTemplateRendererInterface::class));

        $this->assertSame(
            '{"success":"Thanks for joining the mailing list!"}',
            $controller->signUp(),
        );
    }

    public function testSignUpReturnsFailureWhenSignupCannotBeProcessed(): void
    {
        $input = ['email' => 'user@example.com', 'source' => 'footer'];
        $user = ['country_name' => 'United States'];

        $emailModel = $this->createMock(EmailServiceInterface::class);
        $emailModel->expects($this->once())
            ->method('validateEmail')
            ->with('user@example.com')
            ->willReturn(true);
        $emailModel->expects($this->once())
            ->method('checkIfEmailIsOnList')
            ->with('user@example.com')
            ->willReturn(false);
        $emailModel->expects($this->once())
            ->method('emailListSignup')
            ->with($input, $user)
            ->willReturn(false);

        $requestBlocklistService = $this->createMock(RequestBlocklistService::class);
        $requestBlocklistService->expects($this->once())
            ->method('findMatchingSubmissionRule')
            ->with($input, $_SERVER)
            ->willReturn(null);

        $view = $this->createMock(ViewInterface::class);
        $view->expects($this->once())
            ->method('getUser')
            ->willReturn($user);

        $controller = new EmailController($emailModel, $requestBlocklistService, $view, $this->createStub(EmailTemplateRendererInterface::class));

        $this->assertSame(
            '{"error":"Unable to process email signup"}',
            $controller->signUp($input),
        );
    }

    public function testSignUpReturnsBlockedResponseWhenSubmissionMatchesBlacklist(): void
    {
        $input = ['email' => 'blocked@example.com'];

        $emailModel = $this->createMock(EmailServiceInterface::class);
        $emailModel->expects($this->never())->method('validateEmail');

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

        $controller = new EmailController($emailModel, $requestBlocklistService, $view, $this->createStub(EmailTemplateRendererInterface::class));

        $this->assertSame('{"error":"Unable to process request."}', $controller->signUp($input));
        $this->assertSame(403, http_response_code());
    }
}
