<?php

declare(strict_types=1);

namespace App\Core\Config;

final readonly class DatabaseConfig
{
    public function __construct(
        public string $name,
        public string $host,
        public string $user,
        public string $password,
        public string $driver,
        public bool $developmentMode,
        public string $proxyDirectory,
    ) {}
}
