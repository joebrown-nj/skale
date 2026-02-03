<?php
declare(strict_types=1);

namespace App\Core;

use Smarty\Smarty;
// use App\Controllers\PageContentController;
// use App\Controllers\NavController;
// use App\Models\ServiceModel;
use App\Controllers\UserController;

class View
{
    private Smarty $smarty;
    // private PageContentController $pageContentController;
    // private NavController $navController;
    // private ServiceModel $serviceModel;
    private ?string $uri = null;
    private ?string $p1 = null;
    private ?string $p2 = null;
    private ?string $p3 = null;

    
    private UserController $userController;
    private array $user;

    public function __construct() {
        $this->smarty = new Smarty();
        $this->smarty->caching = Smarty::CACHING_OFF;
        $this->smarty->setTemplateDir($_ENV['SMARTY_TEMPLATE_DIR']);
        $this->smarty->setCompileDir($_ENV['SMARTY_TEMPLATE_C_DIR']);
        $this->smarty->setConfigDir($_ENV['SMARTY_CONFIG']);
        $this->smarty->setCacheDir($_ENV['SMARTY_CACHE']);
        // $this->smarty->setCaching(Smarty::CACHING_OFF); // Disable caching for development
        // $this->smarty->clearAllCache();
        // $this->smarty->clearCompiledTemplate();
        $this->smarty->assign('app_name', 'Skaleup');

    //     $this->pageContentController = $pageContentController;
    //     $this->navController = $navController;
    //     $this->serviceModel = $serviceModel;

        $uri = strtok($_SERVER['REQUEST_URI'], '?');
        $this->uri = substr($uri, 0, 1) == '/' ? substr($uri, 1) : $uri;

        $pages = explode('/', $this->uri);
        $this->p1 = isset($pages[0]) ? $pages[0] : '';
        $this->p2 = isset($pages[1]) ? $pages[1] : '';
        $this->p3 = isset($pages[2]) ? $pages[2] : '';

        $this->userController = new UserController();
        // $this->userController = $userController;
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
        // $viewPath = dirname(__DIR__) . "/Views/{$view}.php";

        // if (!file_exists($viewPath)) {
        //     throw new \Exception("View {$view} not found");
        // }

        // ob_start();
        // extract($data);
        // require $viewPath;

        // $content = ob_get_clean();
        // if ($content === false) {
        //     throw new \Exception("Failed to capture view output");
        // }

        // return $content;

        // $pageContentController = new PageContentController();
        // $pageContent = $this->pageContentController->getPageContent();

        // if(isset($_GET['meta-data'])) {
        //     if($this->getP1() == 'blog' && $this->getP3()) {
        //         $blogModel = new BlogModel();
        //         $blog = $blogModel->getBlogByUrl(substr($this->getUri(), 1));

        //         $metaData = json_encode(array(
        //             'keywords' => $blog['metaKeywords'],
        //             'description' => $blog['metaDescription'],
        //             'title' => $_ENV['SITE_NAME'].' blog | '.$blog['metaTitle'],
        //         ));
        //     }

        //     if($pageContent) {
        //         $metaData = json_encode(array(
        //             'keywords' => $pageContent['metaKeywords'],
        //             'description' => $pageContent['metaDescription'],
        //             'title' => $_ENV['SITE_NAME'].' | '.$pageContent['metaTitle'],
        //         ));
        //     }

        //     if($metaData) {
        //         echo $metaData;
        //     }
        // } else {
            // $this->smarty = new Smarty();
            // // $this->smarty->caching = Smarty::CACHING_LIFETIME_CURRENT;
            // // $this->smarty->debugging = false;
            // $this->smarty->caching = Smarty::CACHING_OFF;
            // $this->smarty->setTemplateDir($_ENV['SMARTY_TEMPLATE_DIR']);
            // $this->smarty->setCompileDir($_ENV['SMARTY_TEMPLATE_C_DIR']);
            // $this->smarty->setConfigDir($_ENV['SMARTY_CONFIG']);
            // $this->smarty->setCacheDir($_ENV['SMARTY_CACHE']);
            // $this->smarty->setCaching(Smarty::CACHING_OFF); // Disable caching for development
            // $this->smarty->setCompileCheck(true);
            // // $this->smarty->setDebugging(true);
            // // $this->smarty->setEscapeHtml(true);
            // // $this->smarty->enableSecurity();
            // // $this->smarty->security_policy->secure_dir = [$_ENV['SMARTY_TEMPLATE_DIR']];
            // // $this->smarty->addPluginsDir('./Plugins');
            // $this->smarty->clearAllCache();
            // $this->smarty->clearCompiledTemplate();
            // // $this->smarty->testInstall();

            // native PHP functions used as modifiers need to be registered
            // $this->smarty->registerPlugin('function', 'include', 'include');
// echo $this->uri.' - '.$this->p1.' - '.$this->p2.' - '.$this->p3;
// die;
            // $this->smarty->assign('app_name', 'Skaleup');
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

            // $navController = new NavController();
            // $this->smarty->assign('nav', $navController->getNav('main', 0));
            // $this->smarty->assign('footerNav', $navController->getNav('footer', 0));

            // $serviceModel = new ServiceModel();
            // $this->smarty->assign('serviceList', $this->serviceModel->getAllServices());

            // // $blogModel = new BlogModel();
            // // $this->smarty->assign('blogList', $blogModel->getAllBlogs());

            // // print_r($pageContent);
            // // echo '<hr>';
            // // die;

            // $this->smarty->assign('pageContent', $pageContent);
            // $this->smarty->assign('contactContent', $pageContentController->getPageContent($_ENV['URL_CONTACT']));
            // if($this->p2 != '') $this->smarty->assign('p1Content', $pageContentController->getPageContent($this->p1));

            // // $this->prettyPrint($data);
            // // die;

            // // foreach($data as $key => $value) {
            // //     echo $key.' => '.gettype($value).'<br>';
            // // }
            // // die;
// print_r($data);die;

            $this->smarty->display("$view.tpl");
        // }
    }
}