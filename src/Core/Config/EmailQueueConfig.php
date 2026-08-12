<?php
declare(strict_types=1);

namespace App\Core\Config;

final readonly class EmailQueueConfig
{
    public function __construct(
        public bool $enabled,
        public string $directory,
        public int $maxAttempts,
        public int $processingTimeout,
    ) {
    }
}
