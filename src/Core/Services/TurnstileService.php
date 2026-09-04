<?php

declare(strict_types=1);

namespace App\Core\Services;

/** Server-side Cloudflare Turnstile Siteverify client. */
class TurnstileService
{
    private const SITEVERIFY_URL = 'https://challenges.cloudflare.com/turnstile/v0/siteverify';
    private const MAX_TOKEN_LENGTH = 2048;

    /** @var null|\Closure(string, array<string, string>): string|false */
    private readonly ?\Closure $siteverifyRequest;

    /** @param null|callable(string, array<string, string>): string|false $siteverifyRequest */
    public function __construct(?callable $siteverifyRequest = null)
    {
        $this->siteverifyRequest = $siteverifyRequest === null
            ? null
            : \Closure::fromCallable($siteverifyRequest);
    }

    public function validate(string $token, string $remoteIp = ''): bool
    {
        $secret = trim((string) ($_ENV['CLOUDFLARE_SECRET_KEY'] ?? ''));
        $token = trim($token);

        if ($secret === '' || $token === '' || strlen($token) > self::MAX_TOKEN_LENGTH) {
            return false;
        }

        $data = [
            'secret' => $secret,
            'response' => $token,
        ];

        if (filter_var($remoteIp, FILTER_VALIDATE_IP) !== false) {
            $data['remoteip'] = $remoteIp;
        }

        $response = $this->siteverifyRequest !== null
            ? ($this->siteverifyRequest)(self::SITEVERIFY_URL, $data)
            : $this->requestSiteverify($data);

        if (!is_string($response) || $response === '') {
            return false;
        }

        try {
            $result = json_decode($response, true, flags: JSON_THROW_ON_ERROR);
        } catch (\JsonException) {
            return false;
        }

        return is_array($result) && ($result['success'] ?? false) === true;
    }

    /** @param array<string, string> $data */
    private function requestSiteverify(array $data): string|false
    {
        $context = stream_context_create([
            'http' => [
                'method' => 'POST',
                'header' => "Content-Type: application/x-www-form-urlencoded\r\n",
                'content' => http_build_query($data),
                'timeout' => 10,
                'ignore_errors' => true,
            ],
        ]);

        return @file_get_contents(self::SITEVERIFY_URL, false, $context);
    }
}
