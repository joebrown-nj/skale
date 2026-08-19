final <?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Contracts\ViewInterface;
use App\Models\PortfolioModel;

class PortfolioController
{
    private ViewInterface $view;
    private PortfolioModel $portfolioModel;

    public function index(): void
    {
        $data = [
            'portfolioItems' => $this->portfolioModel->getPortfolioItems(),
        ];
        $this->view->render('portfolio', $data);
    }
}
