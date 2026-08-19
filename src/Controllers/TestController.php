final <?php

namespace App\Controllers;

use App\Models\PageContentModel;

class TestController
{
    private PageContentModel $pageContentModel;

    public function __construct(PageContentModel $pageContentModel)
    {
        $this->pageContentModel = $pageContentModel;
    }

    public function index(): void
    {
        $page = $this->pageContentModel->getPageContentByUrl('');
        echo $page['content']->id . '<br>';
        echo $page['content']->title . '<br>';
        echo $page['content']->content . '<br>';
        echo $page['content']->metaTitle . '<br>';
        echo $page['content']->metaDescription . '<br>';
        echo $page['content']->metaKeywords . '<br>';
        echo $page['content']->dateUpdated . '<br>';
        echo '<hr>';

        echo '<br><br>';

        $metaData = json_encode([
            'keywords' => $page['content']->metaKeywords,
            'description' => $page['content']->metaDescription,
            'title' => $page['content']->metaTitle . ' | ' . $_ENV['SITE_NAME'],
        ]);

        if ($metaData) {
            echo trim($metaData);
        }
    }
}
