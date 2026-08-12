<?php
declare(strict_types=1);

namespace App\Core;

use App\Controllers\UserController;
use App\Core\Contracts\UserLocationProviderInterface;
use App\Core\Contracts\ViewInterface;
use App\Core\Contracts\EmailServiceInterface;
use App\Core\Contracts\ContactFormInterface;
use App\Core\Db\DatabaseConfiguration;
use App\Core\Db\DatabaseORM;
use App\Core\Config\ApplicationConfig;
use App\Core\Config\DatabaseConfig;
use App\Core\Config\EmailQueueConfig;
use App\Core\Config\MailConfig;
use App\Core\Config\SiteConfig;
use DI\ContainerBuilder;
use App\Models\EmailModel;
use App\Models\ContactModel;
use Doctrine\ORM\EntityManager;
use PHPMailer\PHPMailer\PHPMailer;
use Smarty\Smarty;
use Psr\Container\ContainerInterface;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;
use Symfony\Contracts\Cache\CacheInterface;

class Application
{
    private static ?Application $instance = null;
    private Routes $routes;
    private ContainerInterface $container;

    private function __construct()
    {
        self::$instance = $this;
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

        $this->container = $this->buildContainer();

        // Initialize routes
        $this->routes = new Routes();
    }

    private function loadEnvironment(): void
    {
        Environment::boot(dirname(__DIR__, 2));
    }

    private function buildContainer(): ContainerInterface
    {
        $configuration = Environment::configuration(dirname(__DIR__, 2));
        $database = $configuration->database;
        $databaseConfiguration = new DatabaseConfiguration(
            dbname: $database->name,
            host: $database->host,
            user: $database->user,
            password: $database->password,
            driver: $database->driver,
            isDevMode: $database->developmentMode,
            proxyDirectory: $database->proxyDirectory,
        );

        $productionCache = $databaseConfiguration->isDevMode
            ? null
            : new FilesystemAdapter(
                namespace: 'doctrine_orm',
                defaultLifetime: 0,
                directory: dirname(__DIR__, 2).'/var/cache/doctrine',
            );

        $entityManagerFactory = new DatabaseORM($databaseConfiguration, $productionCache);
        $builder = new ContainerBuilder();
        $builder->useAutowiring(true);
        $builder->addDefinitions([
            ApplicationConfig::class => $configuration,
            DatabaseConfig::class => $configuration->database,
            MailConfig::class => $configuration->mail,
            SiteConfig::class => $configuration->site,
            EmailQueueConfig::class => $configuration->emailQueue,
            EntityManager::class => static fn () => $entityManagerFactory->createEntityManager(),
            UserLocationProviderInterface::class => static fn (ContainerInterface $container) =>
                $container->get(UserController::class),
            ViewInterface::class => static fn (ContainerInterface $container) =>
                $container->get(View::class),
            PHPMailer::class => static fn () => new PHPMailer(true),
            Smarty::class => static fn () => new Smarty(),
            CacheInterface::class => static fn () => new FilesystemAdapter(
                namespace: 'site_data',
                defaultLifetime: 86400,
                directory: dirname(__DIR__, 2).'/var/cache'
            ),
            EmailServiceInterface::class => static fn (ContainerInterface $container) =>
                $container->get(EmailModel::class),
            ContactFormInterface::class => static fn (ContainerInterface $container) =>
                $container->get(ContactModel::class),
        ]);

        return $builder->build();
    }

    private function startSession(): void
    {
        if (PHP_SAPI === 'cli' || PHP_SAPI === 'phpdbg') {
            return;
        }

        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function getContainer(): ContainerInterface
    {
        return $this->container;
    }

    public function run(): void
    {
        $this->routes->dispatch();
    }
} 
