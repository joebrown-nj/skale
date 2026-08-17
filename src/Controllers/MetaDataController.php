<?php

namespace App\Controllers;

use App\Core\Config\SiteConfig;
use App\Models\BlogModel;
use App\Models\PageContentModel;

class MetaDataController
{
    private BlogModel $blogModel;
    private PageContentModel $pageContentModel;
    private string $siteName;

    public function __construct(PageContentModel $pageContentModel, BlogModel $blogModel, ?SiteConfig $siteConfig = null)
    {
        $this->pageContentModel = $pageContentModel;
        $this->blogModel = $blogModel;
        $this->siteName = $siteConfig?->name ?? trim((string) ($_ENV['SITE_NAME'] ?? 'Skaleup'));
    }

    public function index($p1 = '', $p2 = '', $p3 = ''): void
    {
        $metaData = null;
        $adjustedSlug = $p1;
        if ($p2) {
            $adjustedSlug .= '/' . $p2;
        }
        if ($p3) {
            $adjustedSlug .= '/' . $p3;
        }
        $adjustedSlug = trim($adjustedSlug, '/');

        if ($p1 == 'blog' && $p2 && $p3) {
            $blog = $this->blogModel->getBlogByUrl('blog/' . $p2 . '/' . $p3);

            if ($blog) {
                $metaData = json_encode([
                    'keywords' => $blog->metaKeywords,
                    'description' => $blog->metaDescription,
                    'title' => $blog->metaTitle . ' | ' . $this->siteName . ' blog',
                ]);
            }
        } else {
            $page = $this->pageContentModel->getPageContentByUrl($adjustedSlug);

            if ($page && isset($page['content'])) {
                $metaData = json_encode([
                    'keywords' => $page['content']->metaKeywords,
                    'description' => $page['content']->metaDescription,
                    'title' => $page['content']->metaTitle . ' | ' . $this->siteName,
                ]);
            }
        }

        if ($metaData) {
            echo trim($metaData);
        }

        return;
    }
}
