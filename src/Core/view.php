<?php
declare(strict_types=1);

namespace App\Core;

use App\Core\Contracts\UserLocationProviderInterface;
use App\Core\Contracts\ViewInterface;
use Smarty\Smarty;

class View implements ViewInterface
{
    private Smarty $smarty;
    private ?string $uri = null;
    private ?string $p1 = null;
    private ?string $p2 = null;
    private ?string $p3 = null;
    private UserLocationProviderInterface $userController;
    private array $user;

    public function __construct(Smarty $smarty, UserLocationProviderInterface $userController) {
        $this->smarty = $smarty;
        $this->smarty->caching = Smarty::CACHING_OFF;
        $this->smarty->setTemplateDir($_ENV['SMARTY_TEMPLATE_DIR']);
        $this->smarty->setCompileDir($_ENV['SMARTY_TEMPLATE_C_DIR']);
        $this->smarty->setConfigDir($_ENV['SMARTY_CONFIG']);
        $this->smarty->setCacheDir($_ENV['SMARTY_CACHE']);
        $this->smarty->assign('app_name', 'Skaleup');

        $uri = strtok($_SERVER['REQUEST_URI'], '?');
        $this->uri = substr($uri, 0, 1) == '/' ? substr($uri, 1) : $uri;

        $pages = explode('/', $this->uri);
        $this->p1 = isset($pages[0]) ? $pages[0] : '';
        $this->p2 = isset($pages[1]) ? $pages[1] : '';
        $this->p3 = isset($pages[2]) ? $pages[2] : '';

        $this->userController = $userController;
        $this->user = $this->userController->getUserLocation();
    }

    public function getP1(): ?string {
        return $this->p1;
    }

    public function getP2(): ?string {
        return $this->p2;
    }

    public function getP3(): ?string {
        return $this->p3;
    }

    public function getUri(): ?string {
        return $this->uri;
    }

    public function getUser(): ?array {
        return $this->user;
    }
    
    public function render(string $view, array $data = [])//: string
    {
        $this->smarty->assign('data', $data);
        $this->smarty->assign('header', isset($_GET['header']) ? $_GET['header'] : true);
        $this->smarty->assign('footer', isset($_GET['footer']) ? $_GET['footer'] : true);
        $this->smarty->assign('uri', $this->uri);
        $this->smarty->assign('p1', $this->p1);
        $this->smarty->assign('p2', $this->p2);
        $this->smarty->assign('p3', $this->p3);

        if(isset($_GET['interests'])){
            $this->smarty->assign('interests', explode(',', $_GET['interests']));
        }

        $this->smarty->display("$view.tpl");
    }
}
