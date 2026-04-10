<?php
declare(strict_types=1);

use Doctrine\DBAL\DriverManager;
use Doctrine\Migrations\Configuration\EntityManager\ExistingEntityManager;
use Doctrine\Migrations\Configuration\Migration\PhpFile;
use Doctrine\Migrations\DependencyFactory;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;
use Symfony\Component\Dotenv\Dotenv;

require_once __DIR__ . '/vendor/autoload.php';

$dotenv = new Dotenv();
$dotenv->load(__DIR__ . '/.env');

$appEnv = $_ENV['APP_ENV'] ?? null;
if ($appEnv !== null) {
    $envFile = __DIR__ . '/' . strtoupper($appEnv) . '.env';
    if (is_file($envFile)) {
        $dotenv->load($envFile);
    }
}

$config = ORMSetup::createAttributeMetadataConfiguration(
    paths: [__DIR__ . '/src/Models/Entities'],
    isDevMode: true,
);

$connection = DriverManager::getConnection([
    'dbname' => $_ENV['DB_NAME'],
    'user' => $_ENV['DB_USER'],
    'password' => $_ENV['DB_PASS'],
    'host' => $_ENV['DB_HOST'],
    'driver' => $_ENV['DB_DRIVER'] ?? 'pdo_mysql',
], $config);

$entityManager = new EntityManager($connection, $config);

$dependencyFactory = DependencyFactory::fromEntityManager(
    new PhpFile(__DIR__ . '/migrations.php'),
    new ExistingEntityManager($entityManager),
);

return $dependencyFactory;
