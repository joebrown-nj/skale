<?php

namespace App;

use Smarty\Smarty;
use App\Controllers\NavController;
use App\Controllers\PageContentController;
use App\Controllers\ServiceController;
use App\Models\ServiceModel;
use App\Models\BlogModel;

class Controller {
    private Smarty $smarty;
    private ?string $uri = null;
    private ?string $method = null;
    private ?string $p1 = null;
    private ?string $p2 = null;
    private ?string $p3 = null;

    public function __construct() {
        $this->method =  $_SERVER['REQUEST_METHOD'];
        $this->uri = strtok($_SERVER['REQUEST_URI'], '?');

        $pages = explode('/', $this->uri);
        $this->p1 = isset($pages[1]) ? $pages[1] : '';
        $this->p2 = isset($pages[2]) ? $pages[2] : '';
        $this->p3 = isset($pages[3]) ? $pages[3] : '';
    }

    protected function getP1() {
        return $this->p1;
    }

    protected function getP2() {
        return $this->p2;
    }

    protected function getP3() {
        return $this->p3;
    }

    protected function getUri() {
        return $this->uri;
    }

    protected function getMethod() {
        return $this->method;
    }

    protected function prettyPrint($arr) {
        echo '<pre>'; print_r($arr); echo '</pre>';
    }

    protected function render(string $view, $data = []): void {
       $this->smarty = new Smarty();
        // $this->smarty->caching = Smarty::CACHING_LIFETIME_CURRENT;
        // $this->smarty->debugging = false;
        $this->smarty->caching = Smarty::CACHING_OFF;
        $this->smarty->setTemplateDir($_ENV['SMARTY_TEMPLATE_DIR']);
        $this->smarty->setCompileDir($_ENV['SMARTY_TEMPLATE_C_DIR']);
        $this->smarty->setConfigDir($_ENV['SMARTY_CONFIG']);
        $this->smarty->setCacheDir($_ENV['SMARTY_CACHE']);
        $this->smarty->setCaching(Smarty::CACHING_OFF); // Disable caching for development
        // $this->smarty->setCompileCheck(true);
        // $this->smarty->setDebugging(true);
        // $this->smarty->setEscapeHtml(true);
        // $this->smarty->enableSecurity();
        // $this->smarty->security_policy->secure_dir = [$_ENV['SMARTY_TEMPLATE_DIR']];
        // $this->smarty->addPluginsDir('./Plugins');
        $this->smarty->clearAllCache();
        $this->smarty->clearCompiledTemplate();
        // $this->smarty->testInstall();

        // native PHP functions used as modifiers need to be registered
        // $this->smarty->registerPlugin('function', 'include', 'include');

        $this->smarty->assign('app_name', 'Skaleup');
        $this->smarty->assign('data', $data);
        $this->smarty->assign('header', isset($_GET['header']) ? $_GET['header'] : true);
        $this->smarty->assign('footer', isset($_GET['footer']) ? $_GET['footer'] : true);
        $this->smarty->assign('p1', $this->getP1());
        $this->smarty->assign('p2', $this->getP2());
        $this->smarty->assign('p3', $this->getP3());

        $navController = new NavController();
        $this->smarty->assign('nav', $navController->getNav('main', 0));
        $this->smarty->assign('footerNav', $navController->getNav('footer', 0));

        $serviceModel = new ServiceModel();
        $this->smarty->assign('serviceList', $serviceModel->getAllServices());

        $blogModel = new BlogModel();
        $this->smarty->assign('blogList', $blogModel->getAllBlogs());

        $pageContentController = new PageContentController();
        $pageContent = $pageContentController->getPageContent();

        if($this->getP2() != '') $this->smarty->assign('p1Content', $pageContentController->getPageContent($this->getP1()));
// print_r($pageContent);
// die;
        $this->smarty->assign('pageContent', $pageContent);
        $this->smarty->assign('contactContent', $pageContentController->getPageContent($_ENV['URL_CONTACT']));

        if(isset($_GET['meta-data'])) {
            if($pageContent) {
                $metaData = json_encode(array(
                    'keywords' => $pageContent['metaKeywords'],
                    'description' => $pageContent['metaDescription'],
                    'title' => $_ENV['SITE_NAME'].' | '.$pageContent['metaTitle'],
                ));
                echo $metaData;
            }
        } else {
            $this->smarty->display("$view.tpl");
        }
    }
}
