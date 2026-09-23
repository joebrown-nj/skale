<?php

declare(strict_types=1);

namespace Tests\Controllers;

use App\Content\PortfolioPageContentProvider;
use App\Controllers\PortfolioController;
use App\Core\Contracts\ViewInterface;
use App\Models\Entities\PortfolioEntity;
use App\Models\Entities\TestimonialEntity;
use App\Models\PortfolioModel;
use PHPUnit\Framework\TestCase;

final class PortfolioControllerTest extends TestCase
{
    public function testDetailLoadsTestimonialsLinkedToThePortfolioItem(): void
    {
        $portfolioItem = new PortfolioEntity();
        $portfolioItem->id = 42;
        $testimonial = new TestimonialEntity();

        $portfolioModel = $this->createMock(PortfolioModel::class);
        $portfolioModel->expects($this->once())
            ->method('getPortfolioItemBySlug')
            ->with('case-study-spins')
            ->willReturn($portfolioItem);
        $portfolioModel->expects($this->once())
            ->method('getTestimonialsForPortfolioItem')
            ->with(42)
            ->willReturn(array($testimonial));

        $view = $this->createMock(ViewInterface::class);
        $view->expects($this->once())
            ->method('render')
            ->with('portfolio-detail', $this->callback(static function (array $data) use ($testimonial): bool {
                return $data['testimonials'] === array($testimonial);
            }));

        $controller = new PortfolioController(
            $portfolioModel,
            $view,
            new PortfolioPageContentProvider(),
        );

        $controller->getPortfolioDetail('case-study-spins');
    }
}
