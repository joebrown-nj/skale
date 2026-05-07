<?php declare(strict_types=1);

namespace Tests\Controllers;

use App\Controllers\EmailController;
use App\Core\Contracts\EmailServiceInterface;
use App\Core\Contracts\ViewInterface;
use PHPUnit\Framework\TestCase;

final class EmailControllerTest extends TestCase
{
    protected function tearDown(): void
    {
        $_POST = [];
    }

    public function testSignUpReturnsErrorForInvalidEmail(): void
    {
        $_POST['email'] = 'not-an-email';

        $emailModel = $this->createMock(EmailServiceInterface::class);
        $emailModel->expects($this->once())
            ->method('validateEmail')
            ->with('not-an-email')
            ->willReturn(false);

        $view = $this->createMock(ViewInterface::class);
        $view->expects($this->never())
            ->method('getUser');

        $controller = new EmailController($emailModel, $view);

        $this->assertSame(
            '{"error":["A valid email is required"]}',
            $controller->signUp()
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

        $view = $this->createMock(ViewInterface::class);
        $view->expects($this->never())
            ->method('getUser');

        $controller = new EmailController($emailModel, $view);

        $this->assertSame(
            '{"error":"You are already on the list"}',
            $controller->signUp()
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

        $view = $this->createMock(ViewInterface::class);
        $view->expects($this->once())
            ->method('getUser')
            ->willReturn($user);

        $controller = new EmailController($emailModel, $view);

        $this->assertSame(
            '{"success":"Thanks for joining the mailing list!"}',
            $controller->signUp()
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

        $view = $this->createMock(ViewInterface::class);
        $view->expects($this->once())
            ->method('getUser')
            ->willReturn($user);

        $controller = new EmailController($emailModel, $view);

        $this->assertSame(
            '{"error":"Unable to process email signup"}',
            $controller->signUp($input)
        );
    }
}
