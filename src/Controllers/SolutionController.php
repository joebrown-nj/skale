<?php

namespace App\Controllers;

use App\Models\SolutionModel;
use App\Models\PageContentModel;
use App\Core\Contracts\ViewInterface;
use App\Models\Entities\ServicePageEntity;

class SolutionController
{
    private SolutionModel $SolutionModel;
    private PageContentModel $pageContentModel;
    private ViewInterface $view;

    public function __construct(SolutionModel $SolutionModel, PageContentModel $pageContentModel, ViewInterface $view) {
        $this->SolutionModel = $SolutionModel;
        $this->pageContentModel = $pageContentModel;
        $this->view = $view;
    }
 
    public function index() {
        $this->view->render('serviceList');
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

        // Only allow a file name generated from a valid solution slug.
        if (!preg_match('/^[a-z0-9]+(?:-[a-z0-9]+)*$/', $slug)) {
            // http_response_code(404);
            // $this->view->render('error/404');
            // return;
        }

        $contentFile = dirname(__DIR__, 2)
            . DIRECTORY_SEPARATOR . 'content'
            . DIRECTORY_SEPARATOR . 'services'
            . DIRECTORY_SEPARATOR . $slug . '.php';

        if (!is_file($contentFile) || !is_readable($contentFile)) {
            // http_response_code(404);
            // $this->view->render('error/404');
            // return;
        } else {
            $sections = require $contentFile;

            if (!is_array($sections)) {
                throw new \UnexpectedValueException(
                    sprintf('Solution content file "%s" must return an array.', $contentFile)
                );
            }
        }

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
