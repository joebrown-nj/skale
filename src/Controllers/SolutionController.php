<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Content\ServicePageContentProvider;
use App\Models\PageContentModel;
use App\Models\BlogModel;
use App\Core\Contracts\ViewInterface;

class SolutionController
{
    private PageContentModel $pageContentModel;
    private BlogModel $blogModel;
    private ViewInterface $view;
    private ServicePageContentProvider $content;

    public function __construct(
        PageContentModel $pageContentModel,
        BlogModel $blogModel,
        ViewInterface $view,
        ServicePageContentProvider $content,
    ) {
        $this->pageContentModel = $pageContentModel;
        $this->blogModel = $blogModel;
        $this->view = $view;
        $this->content = $content;
    }

    public function index(): void
    {
        $this->view->render('service-list');
        // , array(
        //     'blogList' => $this->blogModel->getAllBlogs(null, 3),
        // ));
    }

    public function redirectLegacyServicesIndex(): string
    {
        return $this->redirectToSolutions();
    }

    public function redirectLegacyServicesDetail(string $slug): string
    {
        return $this->redirectToSolutions($slug);
    }

    public function getSolutionDetail(string $slug): void
    {
        $redirects = array(
            'websites' => 'website-design-and-development',
            'website-development' => 'website-design-and-development',
            'wordpress' => 'wordpress-development',
            'analytics-reporting' => 'analytics-and-reporting',
            'marketing-analytics' => 'marketing-analytics-and-growth',
            'it-solutions' => 'it-solutions',
            'automation' => 'automation-crm-and-integrations',
            'software-development' => 'software-and-business-systems',
            'online-marketing' => 'marketing-analytics-and-growth',

        );

        if (isset($redirects[$slug])) {
            $this->redirectToSolutions($redirects[$slug]);
            return;
        }

        $categories = array(
            'websites-and-conversion',
            'automation-crm-and-integrations',
            'software-and-business-systems',
            'marketing-analytics-and-growth',
        );

        $view = in_array($slug, $categories) ? 'service-category' : 'service-detail';

        $solution = $this->pageContentModel->getPageContentByUrl(
            trim($_ENV['URL_SERVICES_SOLUTIONS'], '/') . '/' . trim($slug, '/'),
        );

        if ($solution === false || $solution['content'] === null) {
            http_response_code(404);
            $this->view->render('error/404');
            return;
        }

        $sections = $this->content->getBySlug($slug);

        $this->view->render($view, array(
            'serviceDetail' => $solution['content'],
            'serviceMenu' => $solution['menu'],
            'serviceContent' => $sections,
        ));
    }

    private function redirectToSolutions(?string $slug = null): string
    {
        $location = '/' . trim($_ENV['URL_SERVICES_SOLUTIONS'], '/');

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
