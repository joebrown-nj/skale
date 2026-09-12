<?php

declare(strict_types=1);

namespace Tests\Controllers;

use App\Content\ServicePageContentProvider;
use App\Controllers\SolutionController;
use App\Core\Contracts\ViewInterface;
use App\Models\BlogModel;
use App\Models\PageContentModel;
use PHPUnit\Framework\TestCase;

final class SolutionControllerTest extends TestCase
{
    protected function setUp(): void
    {
        $_ENV['URL_SERVICES_SOLUTIONS'] = 'solutions';
    }

    protected function tearDown(): void
    {
        unset($_ENV['URL_SERVICES_SOLUTIONS']);
        http_response_code(200);
    }

    public function testDetailUsesMenuBackedPageContentWithoutChangingItsUrl(): void
    {
        $menu = (object) ['url' => 'solutions/custom-development'];
        $content = (object) ['content' => '<main>Custom development</main>'];

        $pageContentModel = $this->createMock(PageContentModel::class);
        $pageContentModel->expects($this->once())
            ->method('getPageContentByUrl')
            ->with('solutions/custom-development')
            ->willReturn(['menu' => $menu, 'content' => $content]);

        $view = $this->createMock(ViewInterface::class);
        $view->expects($this->once())
            ->method('render')
            ->with('service-detail', [
                'serviceDetail' => $content,
                'serviceMenu' => $menu,
                'serviceContent' => [],
            ]);

        $controller = new SolutionController(
            $pageContentModel,
            $this->createMock(BlogModel::class),
            $view,
            new ServicePageContentProvider(),
        );

        $controller->getSolutionDetail('custom-development');
    }

    public function testMissingPageContentRendersNotFound(): void
    {
        $pageContentModel = $this->createMock(PageContentModel::class);
        $pageContentModel->method('getPageContentByUrl')->willReturn(false);

        $view = $this->createMock(ViewInterface::class);
        $view->expects($this->once())->method('render')->with('error/404');

        $controller = new SolutionController(
            $pageContentModel,
            $this->createMock(BlogModel::class),
            $view,
            new ServicePageContentProvider(),
        );

        $controller->getSolutionDetail('missing');

        $this->assertSame(404, http_response_code());
    }
}
