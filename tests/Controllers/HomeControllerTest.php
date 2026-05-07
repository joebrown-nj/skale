<?php declare(strict_types=1);

namespace Tests\Controllers;

use App\Controllers\HomeController;
use App\Core\Contracts\EmailServiceInterface;
use App\Core\Contracts\ViewInterface;
use App\Models\BlogModel;
use App\Models\HomeCardsModel;
use App\Models\Entities\BlogEntity;
use App\Models\HomePageModel;
use App\Models\Entities\HomePageEntity;
use App\Models\PageContentModel;
use PHPUnit\Framework\TestCase;

final class HomeControllerTest extends TestCase
{
    protected function tearDown(): void
    {
        $_GET = [];
    }

    public function testIndexRendersHomeViewWithResolvedData(): void
    {
        $hero = new HomePageEntity();
        $hero->headline = 'Grow faster';
        $homeCards = [(object) ['title' => 'Card 1']];
        $featuredBlog = new BlogEntity();
        $featuredBlog->title = 'Featured';
        $blogListItem = new BlogEntity();
        $blogListItem->title = 'Post 1';
        $blogList = [$blogListItem];
        $blogContent = (object) ['metaTitle' => 'Blog'];
        $howItWorks = ['title' => 'How it works'];
        $theResults = ['title' => 'The results'];

        $homePageModel = $this->createMock(HomePageModel::class);
        $homePageModel->expects($this->once())
            ->method('getHeroContent')
            ->willReturn($hero);
        $homePageModel->expects($this->once())
            ->method('getHowItWorksContent')
            ->willReturn($howItWorks);
        $homePageModel->expects($this->once())
            ->method('getTheResultsContent')
            ->willReturn($theResults);

        $homeCardsModel = $this->createMock(HomeCardsModel::class);
        $homeCardsModel->expects($this->once())
            ->method('getHomeCards')
            ->willReturn($homeCards);

        $pageContentModel = $this->createMock(PageContentModel::class);
        $pageContentModel->expects($this->once())
            ->method('getPageContentByUrl')
            ->with('blog')
            ->willReturn(['content' => $blogContent]);

        $blogModel = $this->createMock(BlogModel::class);
        $blogModel->expects($this->once())
            ->method('getFeaturedBlog')
            ->willReturn($featuredBlog);
        $blogModel->expects($this->once())
            ->method('getAllBlogs')
            ->willReturn($blogList);

        $emailModel = $this->createStub(EmailServiceInterface::class);

        $view = $this->createMock(ViewInterface::class);
        $view->expects($this->once())
            ->method('render')
            ->with('home', [
                'hero' => $hero,
                'homeCards' => $homeCards,
                'blogContent' => $blogContent,
                'blogFeatured' => $featuredBlog,
                'blogList' => $blogList,
                'howItWorks' => $howItWorks,
                'theResults' => $theResults,
            ]);

        $controller = new HomeController(
            $homePageModel,
            $homeCardsModel,
            $pageContentModel,
            $blogModel,
            $emailModel,
            $view
        );

        $controller->index();
    }

    public function testIndexRendersNullBlogContentWhenBlogPageIsMissing(): void
    {
        $homePageModel = $this->createMock(HomePageModel::class);
        $homePageModel->method('getHeroContent')->willReturn(null);
        $homePageModel->method('getHowItWorksContent')->willReturn([]);
        $homePageModel->method('getTheResultsContent')->willReturn([]);

        $homeCardsModel = $this->createMock(HomeCardsModel::class);
        $homeCardsModel->method('getHomeCards')->willReturn([]);

        $pageContentModel = $this->createMock(PageContentModel::class);
        $pageContentModel->expects($this->once())
            ->method('getPageContentByUrl')
            ->with('blog')
            ->willReturn(false);

        $blogModel = $this->createMock(BlogModel::class);
        $blogModel->method('getFeaturedBlog')->willReturn(null);
        $blogModel->method('getAllBlogs')->willReturn([]);

        $emailModel = $this->createStub(EmailServiceInterface::class);

        $view = $this->createMock(ViewInterface::class);
        $view->expects($this->once())
            ->method('render')
            ->with('home', $this->callback(static function (array $data): bool {
                return array_key_exists('blogContent', $data) && $data['blogContent'] === null;
            }));

        $controller = new HomeController(
            $homePageModel,
            $homeCardsModel,
            $pageContentModel,
            $blogModel,
            $emailModel,
            $view
        );

        $controller->index();
    }

    public function testUnsubscribeRendersValidationErrorForInvalidEmail(): void
    {
        $_GET['email'] = 'bad-email';

        $homePageModel = $this->createStub(HomePageModel::class);
        $homeCardsModel = $this->createStub(HomeCardsModel::class);
        $pageContentModel = $this->createStub(PageContentModel::class);
        $blogModel = $this->createStub(BlogModel::class);

        $emailModel = $this->createMock(EmailServiceInterface::class);
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
            $homeCardsModel,
            $pageContentModel,
            $blogModel,
            $emailModel,
            $view
        );

        $controller->unsubscribe();
    }

    public function testUnsubscribeRendersSuccessMessageWhenEmailIsRemoved(): void
    {
        $_GET['email'] = 'user@example.com';

        $homePageModel = $this->createStub(HomePageModel::class);
        $homeCardsModel = $this->createStub(HomeCardsModel::class);
        $pageContentModel = $this->createStub(PageContentModel::class);
        $blogModel = $this->createStub(BlogModel::class);

        $emailModel = $this->createMock(EmailServiceInterface::class);
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
            $homeCardsModel,
            $pageContentModel,
            $blogModel,
            $emailModel,
            $view
        );

        $controller->unsubscribe();
    }

    public function testUnsubscribeRendersFailureMessageWhenRemovalFails(): void
    {
        $_GET['email'] = 'user@example.com';

        $homePageModel = $this->createStub(HomePageModel::class);
        $homeCardsModel = $this->createStub(HomeCardsModel::class);
        $pageContentModel = $this->createStub(PageContentModel::class);
        $blogModel = $this->createStub(BlogModel::class);

        $emailModel = $this->createMock(EmailServiceInterface::class);
        $emailModel->expects($this->once())
            ->method('validateEmail')
            ->with('user@example.com')
            ->willReturn(true);
        $emailModel->expects($this->once())
            ->method('emailListUnsubscribe')
            ->with('user@example.com')
            ->willReturn(false);

        $view = $this->createMock(ViewInterface::class);
        $view->expects($this->once())
            ->method('render')
            ->with('unsubscribe', [
                'successMessage' => '',
                'errorMessage' => 'There was a problem unsubscribing you. Please try again later.',
            ]);

        $controller = new HomeController(
            $homePageModel,
            $homeCardsModel,
            $pageContentModel,
            $blogModel,
            $emailModel,
            $view
        );

        $controller->unsubscribe();
    }
}
