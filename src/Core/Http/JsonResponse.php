<?php

declare(strict_types=1);

namespace App\Core\Http;

final class JsonResponse extends Response
{
    /** @param array<string, mixed> $data */
    public function __construct(array $data, int $status = 200)
    {
        parent::__construct(
            json_encode($data, JSON_THROW_ON_ERROR),
            $status,
            ['Content-Type' => 'application/json; charset=UTF-8'],
        );
    }

    public static function success(string|array $message, int $status = 200): self
    {
        return new self(['success' => $message], $status);
    }

    public static function error(string|array $message, int $status = 422): self
    {
        return new self(['error' => $message], $status);
    }
}
