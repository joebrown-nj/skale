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

        (new Dotenv())->bootEnv($projectRoot.'/.env', defaultEnv: 'local');

        self::$bootedRoots[$projectRoot] = true;
    }
}
