<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Contracts\UserLocationProviderInterface;
use App\Models\LogModel;

class LogController
{
    private UserLocationProviderInterface $userController;
    private LogModel $logModel;
    private array $user;

    public function __construct(UserLocationProviderInterface $userController, LogModel $logModel)
    {
        $this->userController = $userController;
        $this->logModel = $logModel;
        $this->user = $this->userController->getUserLocation();
    }

    public function getUser(): array
    {
        return $this->user;
    }

    public function logButtonClick(?array $input = null, ?array $server = null): bool
    {
        $input ??= $_POST;
        $server ??= $_SERVER;

        $data = [
            'target' => $this->normalizeTarget($input['target'] ?? ''),
            'url' => $input['url'] ?? '',
            'detail' => $input['detail'] ?? '',
            'userIP' => $server['REMOTE_ADDR'] ?? '',
            'userInfo' => json_encode($this->user),
            'serverInfo' => json_encode($this->sanitizeServerInfo($server)),
        ];

        return $this->logModel->logButtonClick($data);
    }

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
