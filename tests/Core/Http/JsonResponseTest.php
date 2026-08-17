<?php

declare(strict_types=1);

namespace Tests\Core\Http;

use App\Core\Http\JsonResponse;
use PHPUnit\Framework\TestCase;

final class JsonResponseTest extends TestCase
{
    public function testErrorHasConsistentBodyStatusAndContentType(): void
    {
        $response = JsonResponse::error('Invalid', 400);
        self::assertSame('{"error":"Invalid"}', $response->body());
        self::assertSame(400, $response->status());
        self::assertSame('application/json; charset=UTF-8', $response->headers()['Content-Type']);
    }
}
