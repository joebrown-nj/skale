final <?php

namespace App\Controllers;

use App\Content\ServicePageContentProvider;
use App\Models\SolutionModel;
use App\Models\BlogModel;
use App\Core\Contracts\ViewInterface;

class SolutionController
{
    private SolutionModel $SolutionModel;
    private BlogModel $blogModel;
    private ViewInterface $view;
    private ServicePageContentProvider $content;

    public function index(): void
    {
        $this->view->render('serviceList', [
            'blogList' => $this->blogModel->getAllBlogs(null, 3),
        ]);
    }

    private function redirectToSolutions(?string $slug = null): string
    {
        $location = '/' . trim((string) $_ENV['URL_SERVICES_SOLUTIONS'], '/');

        if ($slug !== null && $slug !== '') {
            $location .= '/' . ltrim($slug, '/');
        }

        if (!empty($_SERVER['QUERY_STRING'])) {
            $location .= '?' . $_SERVER['QUERY_STRING'];
        }

        http_response_code(301);
        header('Location: ' . $location, true, 301);

        return '';
    }
}
