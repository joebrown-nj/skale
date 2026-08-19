final <?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\SiteDataCache;
use App\Models\LogModel;

class LogController
{
    private SiteDataCache $siteDataCache;
    private LogModel $logModel;
    private array $user;

    private function sanitizeServerInfo(array $server): array
    {
        foreach (array_keys($_ENV) as $envKey) {
            unset($server[$envKey]);
        }

        return $server;
    }

    private function normalizeTarget(string $target): string
    {
        $target = trim($target);

        if ($target === '') {
            return '';
        }

        $path = parse_url($target, PHP_URL_PATH);
        $query = parse_url($target, PHP_URL_QUERY);
        $fragment = parse_url($target, PHP_URL_FRAGMENT);

        if ($path === null || $path === false || $path === '') {
            $path = '/';
        }

        $normalizedTarget = $path;

        if (is_string($query) && $query !== '') {
            $normalizedTarget .= '?' . $query;
        }

        if (is_string($fragment) && $fragment !== '') {
            $normalizedTarget .= '#' . $fragment;
        }

        return $normalizedTarget;
    }
}
