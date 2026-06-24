<?php
declare(strict_types=1);

namespace App\Core;

use Symfony\Component\Dotenv\Dotenv;

final class Environment
{
    /**
     * @var array<string, true>
     */
    private static array $bootedRoots = [];

    private function __construct()
    {
    }

    public static function boot(string $projectRoot): void
    {
        $projectRoot = rtrim($projectRoot, DIRECTORY_SEPARATOR);

        if (isset(self::$bootedRoots[$projectRoot])) {
            return;
        }

        // Shared hosting browser requests and cron jobs often can't inject APP_ENV,
        // so we default to production and let .env.local opt local machines into local mode.
        (new Dotenv())->bootEnv($projectRoot.'/.env', defaultEnv: 'prod');

        self::$bootedRoots[$projectRoot] = true;
    }
}
