<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Contracts\ViewInterface;
use App\Models\PortfolioModel;
use App\Content\PortfolioPageContentProvider;

class PortfolioController
{
    private ViewInterface $view;
    private PortfolioModel $portfolioModel;
    private PortfolioPageContentProvider $content;

    public function __construct(PortfolioModel $portfolioModel, ViewInterface $view, PortfolioPageContentProvider $content)
    {
        $this->view = $view;
        $this->portfolioModel = $portfolioModel;
        $this->content = $content;
    }

    public function index()
    {
        $data = array(
            'portfolioItems' => $this->portfolioModel->getPortfolioItems(),
        );
        $this->view->render('portfolio', $data);
    }

    public function getPortfolioDetail(string $slug)
    {
        $portfolioItem = $this->portfolioModel->getPortfolioItemBySlug($slug);

        $data = array(
            'portfolioItem' => $portfolioItem,
            'testimonials' => null === $portfolioItem || null === $portfolioItem->getId()
                ? array()
                : $this->portfolioModel->getTestimonialsForPortfolioItem($portfolioItem->getId()),
            'content' => $this->content->getBySlug($slug),
        );
        $this->view->render('portfolio-detail', $data);
    }
}
