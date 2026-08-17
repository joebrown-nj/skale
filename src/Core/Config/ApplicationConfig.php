<?php

declare(strict_types=1);

namespace App\Core\Config;

final readonly class ApplicationConfig
{
    public function __construct(
        public string $environment,
        public DatabaseConfig $database,
        public MailConfig $mail,
        public SiteConfig $site,
        public EmailQueueConfig $emailQueue,
    ) {}
}
