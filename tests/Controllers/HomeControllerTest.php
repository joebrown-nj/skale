<?php declare(strict_types=1);

namespace Tests\Controllers;

use App\Controllers\HomeController;
use App\Core\Contracts\ViewInterface;
use App\Core\LoadSessionData;
use App\Models\BlogModel;
use App\Models\EmailModel;
use App\Models\HomePageModel;
use App\Models\PageContentModel;
use PHPUnit\Framework\TestCase;

final class HomeControllerTest extends TestCase
{
    protected function tearDown(): void
    {
        $_GET = [];
    }

    public function testUnsubscribeRendersValidationErrorForInvalidEmail(): void
    {
        $_GET['email'] = 'bad-email';

        $homePageModel = $this->createStub(HomePageModel::class);
        $pageContentModel = $this->createStub(PageContentModel::class);
        $blogModel = $this->createStub(BlogModel::class);
        $loadSessionData = $this->createStub(LoadSessionData::class);

        $emailModel = $this->createMock(EmailModel::class);
        $emailModel->expects($this->once())
            ->method('validateEmail')
            ->with('bad-email')
            ->willReturn(false);
        $emailModel->expects($this->never())
            ->method('emailListUnsubscribe');

        $view = $this->createMock(ViewInterface::class);
        $view->expects($this->once())
            ->method('render')
            ->with('unsubscribe', [
                'successMessage' => '',
                'errorMessage' => 'A valid email is required to unsubscribe',
            ]);

        $controller = new HomeController(
            $homePageModel,
            $pageContentModel,
            $blogModel,
            $emailModel,
            $loadSessionData,
            $view
        );

        $controller->unsubscribe();
    }

    public function testUnsubscribeRendersSuccessMessageWhenEmailIsRemoved(): void
    {
        $_GET['email'] = 'user@example.com';

        $homePageModel = $this->createStub(HomePageModel::class);
        $pageContentModel = $this->createStub(PageContentModel::class);
        $blogModel = $this->createStub(BlogModel::class);
        $loadSessionData = $this->createStub(LoadSessionData::class);

        $emailModel = $this->createMock(EmailModel::class);
        $emailModel->expects($this->once())
            ->method('validateEmail')
            ->with('user@example.com')
            ->willReturn(true);
        $emailModel->expects($this->once())
            ->method('emailListUnsubscribe')
            ->with('user@example.com')
            ->willReturn(true);

        $view = $this->createMock(ViewInterface::class);
        $view->expects($this->once())
            ->method('render')
            ->with('unsubscribe', [
                'successMessage' => 'You have been unsubscribed',
                'errorMessage' => '',
            ]);

        $controller = new HomeController(
            $homePageModel,
            $pageContentModel,
            $blogModel,
            $emailModel,
            $loadSessionData,
            $view
        );

        $controller->unsubscribe();
    }
}
