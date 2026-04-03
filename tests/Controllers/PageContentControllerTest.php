<?php declare(strict_types=1);

namespace Tests\Controllers;

use App\Controllers\PageContentController;
use App\Models\PageContentModel;
use PHPUnit\Framework\TestCase;

final class PageContentControllerTest extends TestCase
{
    public function testGetPageContentReturnsModelResult(): void
    {
        $expected = [
            'menu' => (object) ['url' => 'contact'],
            'pageContent' => (object) ['metaTitle' => 'Contact'],
        ];

        $pageContentModel = $this->createMock(PageContentModel::class);
        $pageContentModel->expects($this->once())
            ->method('getPageContentByUrl')
            ->with('contact')
            ->willReturn($expected);

        $controller = new PageContentController($pageContentModel);

        $this->assertSame($expected, $controller->getPageContent('contact'));
    }

    public function testGetPageContentReturnsFalseWhenModelDoesNotFindPage(): void
    {
        $pageContentModel = $this->createMock(PageContentModel::class);
        $pageContentModel->expects($this->once())
            ->method('getPageContentByUrl')
            ->with('missing')
            ->willReturn(false);

        $controller = new PageContentController($pageContentModel);

        $this->assertFalse($controller->getPageContent('missing'));
    }
}
