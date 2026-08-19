final <?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Contracts\ViewInterface;

class SubPageController
{
    private ViewInterface $view;

    public function index(): void
    {
        $this->view->render('subpage');
    }
}
