<?php

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

    public function __construct(
        SolutionModel $SolutionModel,
        BlogModel $blogModel,
        ViewInterface $view,
        ServicePageContentProvider $content,
    ) {
        $this->SolutionModel = $SolutionModel;
        $this->blogModel = $blogModel;
        $this->view = $view;
        $this->content = $content;
    }
 
    public function index() {
        $this->view->render('serviceList', array(
            'blogList' => $this->blogModel->getAllBlogs(null, 3),
        ));
    }

    public function redirectLegacyServicesIndex(): string
    {
        return $this->redirectToSolutions();
    }

    public function redirectLegacyServicesDetail(string $slug): string
    {
        return $this->redirectToSolutions($slug);
    }

    public function getSolutionDetail(string $slug) {
        $sections = [];
        $solution = $this->SolutionModel->getSolutionByUrl($slug);
        if(empty($solution)) {
            http_response_code(404);
            $this->view->render('error/404');
            return;
        }

        // $pageContent = $this->pageContentModel->getPageContentByUrl($_ENV['URL_SERVICES_SOLUTIONS'].'/'.$slug);
        // if(empty($pageContent) || $pageContent === false) {
        //     http_response_code(404);
        //     $this->view->render('error/404');
        //     return;
        // }

        $sections = $this->content->getBySlug($slug);

        $this->view->render('serviceDetail', array(
            'serviceDetail' => $solution,
            'serviceContent' => $sections,
            // 'p1Page' => $this->pageContentModel->getPageContentByUrl($_ENV['URL_SERVICES_SOLUTIONS']),
        ));
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
