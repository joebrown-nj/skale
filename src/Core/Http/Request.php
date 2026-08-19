<?php

declare(strict_types=1);

namespace App\Core\Http;

final class Request
{
    /** @param array<string, mixed> $query @param array<string, mixed> $post @param array<string, mixed> $server */
    public function __construct(
        private readonly array $query = [],
        private readonly array $post = [],
        private readonly array $server = [],
        private readonly array $cookies = [],
    ) {}

    public static function fromGlobals(): self
    {
        return new self($_GET, $_POST, $_SERVER, $_COOKIE);
    }
    /** @return array<string, mixed> */
    public function post(): array
    {
        return $this->post;
    }
    /** @return array<string, mixed> */
    public function server(): array
    {
        $server = $this->server;
        $server['REMOTE_ADDR'] = $this->clientIp();
        unset($server['HTTP_X_FORWARDED_FOR'], $server['HTTP_CLIENT_IP']);
        return $server;
    }



    public function clientIp(): string
    {
        $remote = trim((string) ($this->server['REMOTE_ADDR'] ?? ''));
        if (!$this->isTrustedProxy($remote)) {
            return $remote;
        }
        $forwarded = array_map('trim', explode(',', (string) ($this->server['HTTP_X_FORWARDED_FOR'] ?? '')));
        foreach ($forwarded as $ip) {
            if (filter_var($ip, FILTER_VALIDATE_IP)) {
                return $ip;
            }
        }
        return $remote;
    }

    private function isTrustedProxy(string $remote): bool
    {
        $configured = array_filter(array_map('trim', explode(',', (string) ($_ENV['TRUSTED_PROXIES'] ?? ''))));
        return $remote !== '' && in_array($remote, $configured, true);
    }
}
