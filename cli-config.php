<?php
declare(strict_types=1);

use App\Core\Environment;
use Doctrine\DBAL\DriverManager;
use Doctrine\Migrations\Configuration\EntityManager\ExistingEntityManager;
use Doctrine\Migrations\Configuration\Migration\PhpFile;
use Doctrine\Migrations\DependencyFactory;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;

require_once __DIR__ . '/vendor/autoload.php';

Environment::boot(__DIR__);
$database = Environment::configuration(__DIR__)->database;

$config = ORMSetup::createAttributeMetadataConfiguration(
    paths: [__DIR__ . '/src/Models/Entities'],
    isDevMode: true,
);

$connection = DriverManager::getConnection([
    'dbname' => $database->name,
    'user' => $database->user,
    'password' => $database->password,
    'host' => $database->host,
    'driver' => $database->driver,
], $config);

$entityManager = new EntityManager($connection, $config);

$dependencyFactory = DependencyFactory::fromEntityManager(
    new PhpFile(__DIR__ . '/migrations.php'),
    new ExistingEntityManager($entityManager),
);

return $dependencyFactory;
