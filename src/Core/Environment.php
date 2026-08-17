<?php

declare(strict_types=1);

namespace App\Core;

use App\Core\Config\ApplicationConfig;
use App\Core\Config\ConfigurationFactory;
use Symfony\Component\Dotenv\Dotenv;

final class Environment
{
    /**
     * @var array<string, true>
     */
    private static array $bootedRoots = [];
    /** @var array<string, ApplicationConfig> */
    private static array $configurations = [];

    private function __construct() {}

    public static function boot(string $projectRoot): void
    {
        $projectRoot = rtrim($projectRoot, DIRECTORY_SEPARATOR);

        if (isset(self::$bootedRoots[$projectRoot])) {
            return;
        }

        // Shared hosting browser requests and cron jobs often can't inject APP_ENV,
        // so we default to production and let .env.local opt local machines into local mode.
        (new Dotenv())->bootEnv($projectRoot . '/.env', defaultEnv: 'prod');

        self::$configurations[$projectRoot] = ConfigurationFactory::fromEnvironment($_ENV, $projectRoot);
        self::$bootedRoots[$projectRoot] = true;
    }

    public static function configuration(string $projectRoot): ApplicationConfig
    {
        $projectRoot = rtrim($projectRoot, DIRECTORY_SEPARATOR);
        self::boot($projectRoot);
        return self::$configurations[$projectRoot];
    }
}
