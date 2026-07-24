<?php declare(strict_types=1);

namespace Tests\Controllers;

use App\Controllers\MetaDataController;
use App\Models\BlogModel;
use App\Models\Entities\BlogEntity;
use App\Models\PageContentModel;
use PHPUnit\Framework\TestCase;

final class MetaDataControllerTest extends TestCase
{
    protected function setUp(): void
    {
        $_ENV['SITE_NAME'] = 'Skaleup';
    }

    public function testIndexOutputsPageMetaDataForStandardPage(): void
    {
        $page = (object) [
            'metaKeywords' => 'marketing, seo',
            'metaDescription' => 'Page description',
            'metaTitle' => 'About Us',
        ];

        $pageContentModel = $this->createMock(PageContentModel::class);
        $pageContentModel->expects($this->once())
            ->method('getPageContentByUrl')
            ->with('about')
            ->willReturn(['content' => $page]);

        $blogModel = $this->createMock(BlogModel::class);
        $blogModel->expects($this->never())
            ->method('getBlogByUrl');

        $controller = new MetaDataController($pageContentModel, $blogModel);

        ob_start();
        $controller->index('about');
        $output = ob_get_clean();

        $this->assertSame(
            '{"keywords":"marketing, seo","description":"Page description","title":"About Us | Skaleup"}',
            $output
        );
    }

    public function testIndexCombinesNestedSlugSegmentsForPageLookup(): void
    {
        $page = (object) [
            'metaKeywords' => 'privacy, policy',
            'metaDescription' => 'Privacy details',
            'metaTitle' => 'Privacy Policy',
        ];

        $pageContentModel = $this->createMock(PageContentModel::class);
        $pageContentModel->expects($this->once())
            ->method('getPageContentByUrl')
            ->with('legal/privacy-policy')
            ->willReturn(['content' => $page]);

        $blogModel = $this->createMock(BlogModel::class);
        $blogModel->expects($this->never())
            ->method('getBlogByUrl');

        $controller = new MetaDataController($pageContentModel, $blogModel);

        ob_start();
        $controller->index('legal', 'privacy-policy');
        $output = ob_get_clean();

        $this->assertSame(
            '{"keywords":"privacy, policy","description":"Privacy details","title":"Privacy Policy | Skaleup"}',
            $output
        );
    }

    public function testIndexOutputsBlogMetaDataForBlogDetailPage(): void
    {
        $blog = new BlogEntity();
        $blog->metaKeywords = 'growth, strategy';
        $blog->metaDescription = 'Blog description';
        $blog->metaTitle = 'How to Scale';

        $pageContentModel = $this->createMock(PageContentModel::class);
        $pageContentModel->expects($this->never())
            ->method('getPageContentByUrl');

        $blogModel = $this->createMock(BlogModel::class);
        $blogModel->expects($this->once())
            ->method('getBlogByUrl')
            ->with('blog/2026-01-01/how-to-scale')
            ->willReturn($blog);

        $controller = new MetaDataController($pageContentModel, $blogModel);

        ob_start();
        $controller->index('blog', '2026-01-01', 'how-to-scale');
        $output = ob_get_clean();

        $this->assertSame(
            '{"keywords":"growth, strategy","description":"Blog description","title":"How to Scale | Skaleup blog"}',
            $output
        );
    }

    public function testIndexOutputsNothingWhenBlogDoesNotExist(): void
    {
        $pageContentModel = $this->createMock(PageContentModel::class);
        $pageContentModel->expects($this->never())
            ->method('getPageContentByUrl');

        $blogModel = $this->createMock(BlogModel::class);
        $blogModel->expects($this->once())
            ->method('getBlogByUrl')
            ->with('blog/2026-01-01/missing-post')
            ->willReturn(null);

        $controller = new MetaDataController($pageContentModel, $blogModel);

        ob_start();
        $controller->index('blog', '2026-01-01', 'missing-post');
        $output = ob_get_clean();

        $this->assertSame('', $output);
    }

    public function testIndexOutputsNothingWhenNoPageContentExists(): void
    {
        $pageContentModel = $this->createMock(PageContentModel::class);
        $pageContentModel->expects($this->once())
            ->method('getPageContentByUrl')
            ->with('missing-page')
            ->willReturn(false);

        $blogModel = $this->createMock(BlogModel::class);
        $blogModel->expects($this->never())
            ->method('getBlogByUrl');

        $controller = new MetaDataController($pageContentModel, $blogModel);

        ob_start();
        $controller->index('missing-page');
        $output = ob_get_clean();

        $this->assertSame('', $output);
    }
}
