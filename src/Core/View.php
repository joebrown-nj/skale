final <?php

declare(strict_types=1);

namespace App\Core;

use App\Core\Contracts\ViewInterface;
use Smarty\Smarty;

class View implements ViewInterface
{
    private Smarty $smarty;
    private ?string $uri = null;
    private ?string $p1 = null;
    private ?string $p2 = null;
    private ?string $p3 = null;
    private SiteDataCache $siteDataCache;
    private PageContextProvider $pageContextProvider;
    private array $user;

    #[\Override]
    public function getP1(): ?string
    {
        return $this->p1;
    }

    #[\Override]
    public function getP2(): ?string
    {
        return $this->p2;
    }

    #[\Override]
    public function getP3(): ?string
    {
        return $this->p3;
    }

    #[\Override]
    public function getUri(): ?string
    {
        return $this->uri;
    }

    #[\Override]
    public function getUser(): ?array
    {
        return $this->user;
    }

    #[\Override]
    public function render(string $view, array $data = []): void
    {
        $page = $this->pageContextProvider->resolve($this->uri);

        // $this->smarty->clearAllCache();
        $this->smarty->assign($this->siteDataCache->getSharedData());
        $this->smarty->assign('page', $page);
        $this->smarty->assign('data', $data);
        $this->smarty->assign('viewName', $view);
        $this->smarty->assign('header', isset($_GET['header']) ? $_GET['header'] : true);
        $this->smarty->assign('footer', isset($_GET['footer']) ? $_GET['footer'] : true);
        $this->smarty->assign('uri', $this->uri);
        $this->smarty->assign('p1', $this->p1);
        $this->smarty->assign('p2', $this->p2);
        $this->smarty->assign('p3', $this->p3);

        if (isset($_GET['interests'])) {
            $this->smarty->assign('interests', explode(',', $_GET['interests']));
        }

        $this->smarty->display("$view.tpl");
    }
}
