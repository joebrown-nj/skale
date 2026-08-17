<?php

declare(strict_types=1);

namespace App\Core\Config;

final readonly class MailConfig
{
    public function __construct(
        public string $host,
        public int $port,
        public bool $authentication,
        public string $username,
        public string $password,
        public string $encryption,
        public string $fromAddress,
        public string $replyToAddress,
        public string $adminAddress,
    ) {}
}
