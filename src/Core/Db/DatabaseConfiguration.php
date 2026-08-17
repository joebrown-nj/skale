<?php

declare(strict_types=1);

namespace App\Core\Db;

final readonly class DatabaseConfiguration
{
    public function __construct(
        public string $dbname,
        public string $host,
        public string $user,
        public string $password,
        public string $driver,
        public bool $isDevMode,
        public string $proxyDirectory,
    ) {}
}
