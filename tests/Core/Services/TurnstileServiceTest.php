<?php

declare(strict_types=1);

namespace Tests\Core\Services;

use App\Core\Services\TurnstileService;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

final class TurnstileServiceTest extends TestCase
{
    protected function setUp(): void
    {
        $_ENV['CLOUDFLARE_SECRET_KEY'] = 'test-secret';
    }

    protected function tearDown(): void
    {
        unset($_ENV['CLOUDFLARE_SECRET_KEY']);
    }

    public function testValidTokenReturnsTrueAndSendsExpectedPayload(): void
    {
        $service = new TurnstileService(
            function (string $url, array $data): string {
                $this->assertSame(
                    'https://challenges.cloudflare.com/turnstile/v0/siteverify',
                    $url,
                );
                $this->assertSame([
                    'secret' => 'test-secret',
                    'response' => 'valid-token',
                    'remoteip' => '192.0.2.1',
                ], $data);

                return '{"success":true}';
            },
        );

        $this->assertTrue($service->validate('valid-token', '192.0.2.1'));
    }

    #[DataProvider('invalidResponseProvider')]
    public function testInvalidResponsesFailClosed(string|false $response): void
    {
        $service = new TurnstileService(static fn(): string|false => $response);

        $this->assertFalse($service->validate('invalid-token'));
    }

    /** @return iterable<string, array{string|false}> */
    public static function invalidResponseProvider(): iterable
    {
        yield 'unsuccessful verification' => ['{"success":false}'];
        yield 'invalid JSON' => ['not-json'];
        yield 'network failure' => [false];
    }

    public function testMissingSecretOrInvalidTokenDoesNotCallSiteverify(): void
    {
        $calls = 0;
        $service = new TurnstileService(static function () use (&$calls): string {
            ++$calls;
            return '{"success":true}';
        });

        $this->assertFalse($service->validate(''));
        $this->assertFalse($service->validate(str_repeat('a', 2049)));

        unset($_ENV['CLOUDFLARE_SECRET_KEY']);
        $this->assertFalse($service->validate('valid-token'));
        $this->assertSame(0, $calls);
    }
}
