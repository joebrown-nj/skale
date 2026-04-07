<?php declare(strict_types=1);

namespace Tests\Controllers;

use App\Controllers\SubPageController;
use App\Core\Contracts\ViewInterface;
use App\Core\LoadSessionData;
use App\Models\PageContentModel;
use PHPUnit\Framework\TestCase;

final class SubPageControllerTest extends TestCase
{
    public function testIndexRendersSubpageUsingInjectedView(): void
    {
        $pageContent = ['pageContent' => (object) ['metaTitle' => 'Privacy Policy']];

        $pageContentModel = $this->createMock(PageContentModel::class);
        $pageContentModel->expects($this->once())
            ->method('getPageContentByUrl')
            ->with('privacy-policy')
            ->willReturn($pageContent);

        $loadSessionData = $this->createStub(LoadSessionData::class);

        $view = $this->createMock(ViewInterface::class);
        $view->expects($this->once())
            ->method('getUri')
            ->willReturn('privacy-policy');
        $view->expects($this->once())
            ->method('render')
            ->with('subpage', ['pageContent' => $pageContent]);

        $controller = new SubPageController($pageContentModel, $loadSessionData, $view);
        $controller->index();
    }
}
