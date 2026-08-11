<?php
declare(strict_types=1);

namespace App\Core\Db;

use App\Core\ErrorHandler;
use Doctrine\DBAL\DriverManager;
use Doctrine\DBAL\Exception\ConnectionException;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;
use Doctrine\ORM\Proxy\ProxyFactory;
use Psr\Cache\CacheItemPoolInterface;

final readonly class DatabaseORM
{
    public function __construct(
        private DatabaseConfiguration $databaseConfiguration,
        private ?CacheItemPoolInterface $productionCache = null,
    ) {
    }

    public function createEntityManager(): EntityManager
    {
        $config = ORMSetup::createAttributeMetadataConfig(
            paths: [dirname(__DIR__, 3).'/src/Models/Entities'],
            isDevMode: $this->databaseConfiguration->isDevMode,
            cache: $this->databaseConfiguration->isDevMode ? null : $this->productionCache,
        );

        $this->prepareProxyDirectory();
        $config->setProxyDir($this->databaseConfiguration->proxyDirectory);
        $config->setProxyNamespace('DoctrineProxies');
        $config->setAutoGenerateProxyClasses(
            $this->databaseConfiguration->isDevMode
                ? ProxyFactory::AUTOGENERATE_ALWAYS
                : ProxyFactory::AUTOGENERATE_FILE_NOT_EXISTS,
        );

        $dbParams = [
            'dbname' => $this->databaseConfiguration->dbname,
            'user' => $this->databaseConfiguration->user,
            'password' => $this->databaseConfiguration->password,
            'host' => $this->databaseConfiguration->host,
            'driver' => $this->databaseConfiguration->driver,
        ];

        try {
            $connection = DriverManager::getConnection($dbParams, $config);
            return new EntityManager($connection, $config);
        } catch (ConnectionException $e) {
            ErrorHandler::report($e);
            throw new \RuntimeException('Failed to connect to the database. Please check your database configuration.', previous: $e);
        }
    }

    private function prepareProxyDirectory(): void
    {
        $proxyDirectory = $this->databaseConfiguration->proxyDirectory;

        if (
            !is_dir($proxyDirectory)
            && !mkdir($proxyDirectory, 0775, true)
            && !is_dir($proxyDirectory)
        ) {
            throw new \RuntimeException(sprintf('Unable to create Doctrine proxy directory: %s', $proxyDirectory));
        }

        if (!is_writable($proxyDirectory)) {
            throw new \RuntimeException(sprintf('Doctrine proxy directory is not writable: %s', $proxyDirectory));
        }
    }
}
