<?php
declare(strict_types=1);

namespace App\Core\Http;

final class JsonResponse
{
    public static function success(string|array $message): string
    {
        return json_encode(['success' => $message]);
    }

    public static function error(string|array $message): string
    {
        return json_encode(['error' => $message]);
    }
}
