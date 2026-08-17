<?php

declare(strict_types=1);

namespace App\Core\Config;

final readonly class SiteConfig
{
    public function __construct(
        public string $name,
        public string $url,
        public string $email,
        public string $phone,
        public int $blogItemsPerPage,
    ) {}
}
