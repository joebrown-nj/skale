<?php
declare(strict_types=1);

namespace Tests\Core\Http;

use App\Core\Http\Request;
use PHPUnit\Framework\TestCase;

final class RequestTest extends TestCase
{
    protected function tearDown(): void { unset($_ENV['TRUSTED_PROXIES']); }

    public function testItDoesNotTrustForwardedAddressesByDefault(): void
    {
        $request = new Request(server: [
            'REMOTE_ADDR' => '203.0.113.10',
            'HTTP_X_FORWARDED_FOR' => '198.51.100.4',
        ]);
        self::assertSame('203.0.113.10', $request->clientIp());
        self::assertArrayNotHasKey('HTTP_X_FORWARDED_FOR', $request->server());
    }

    public function testItTrustsForwardingOnlyFromAConfiguredProxy(): void
    {
        $_ENV['TRUSTED_PROXIES'] = '10.0.0.2';
        $request = new Request(server: [
            'REMOTE_ADDR' => '10.0.0.2',
            'HTTP_X_FORWARDED_FOR' => '198.51.100.4, 10.0.0.1',
        ]);
        self::assertSame('198.51.100.4', $request->clientIp());
        self::assertSame('198.51.100.4', $request->server()['REMOTE_ADDR']);
    }
}
