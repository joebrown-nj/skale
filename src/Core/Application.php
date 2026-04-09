<?php
declare(strict_types=1);

namespace App\Core;

use App\Controllers\UserController;
use App\Core\Contracts\UserLocationProviderInterface;
use App\Core\Contracts\ViewInterface;
use App\Core\Contracts\EmailServiceInterface;
use App\Core\db\DatabaseORM;
use App\Core\DI\Container;
use App\Models\EmailModel;
use Doctrine\ORM\EntityManager;
use PHPMailer\PHPMailer\PHPMailer;
use Smarty\Smarty;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;
use Symfony\Component\Dotenv\Dotenv;
use Symfony\Contracts\Cache\CacheInterface;

class Application
{
    private static ?Application $instance = null;
    private Routes $routes;
    private Container $container;

    private function __construct()
    {
        self::$instance = $this;
        $this->container = Container::getInstance();
        $this->initialize();
    }

    public static function getInstance(): Application
    {
        if(self::$instance === null){
            self::$instance = new self();
        }
        return self::$instance;
    }

    private function initialize(): void
    {
        // Start session
        $this->startSession();

        // Load environment variables
        $this->loadEnvironment();

        $this->registerEntityManager();
        $this->registerSharedDependencies();

        // Initialize routes
        $this->routes = new Routes();
    }

    private function loadEnvironment(): void
    {
        // $dotenv = \Dotenv\Dotenv::createImmutable(dirname(__DIR__, 2));
        // $dotenv->load();

        $dotenv = new Dotenv();
        $dotenv->load('../.env');
        $dotenv->load('../'.strtoupper($_ENV['APP_ENV']).'.env');
    }

    private function registerEntityManager(): void
    {
        $this->container->set(DatabaseORM::class, function (){
            return new DatabaseORM(
                $_ENV['DB_NAME'],
                $_ENV['DB_HOST'],
                $_ENV['DB_USER'],
                $_ENV['DB_PASS'],
                $_ENV['DB_DRIVER'] ?? 'pdo_mysql',
            );
        });
        // Register EntityManager
        $this->container->set(EntityManager::class, function () {
            return $this->container->get(DatabaseORM::class)->initialize();
        });
    }

    private function registerSharedDependencies(): void
    {
        $this->container->set(UserLocationProviderInterface::class, function () {
            return $this->container->get(UserController::class);
        });

        $this->container->set(ViewInterface::class, function () {
            return $this->container->get(View::class);
        });

        $this->container->set(PHPMailer::class, function () {
            return new PHPMailer(true);
        });

        $this->container->set(Smarty::class, function () {
            return new Smarty();
        });

        $this->container->set(CacheInterface::class, function () {
            return new FilesystemAdapter(
                namespace: 'site_data',
                defaultLifetime: 86400,
                directory: dirname(__DIR__, 2).'/var/cache'
            );
        });

        $this->container->set(EmailServiceInterface::class, function () {
            return $this->container->get(EmailModel::class);
        });
    }

    private function startSession(): void
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function getContainer(): Container
    {
        return $this->container;
    }

    public function run(): void
    {
        $this->routes->dispatch();
    }
} 
