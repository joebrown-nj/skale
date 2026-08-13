<?php
declare(strict_types=1);

namespace Tests\Core\Http;

use App\Core\Http\Form\LeadFormRequest;
use App\Core\Http\Request;
use PHPUnit\Framework\TestCase;

final class LeadFormRequestTest extends TestCase
{
    protected function tearDown(): void { unset($_SESSION['csrf_token']); }

    public function testItNormalizesAndLimitsInput(): void
    {
        $form = new LeadFormRequest(new Request(post: [
            'name' => '  Jane   Doe ',
            'email' => ' JANE@EXAMPLE.COM ',
            'comment' => str_repeat('x', 2100),
        ]));
        self::assertSame('Jane Doe', $form->validated()['name']);
        self::assertSame('jane@example.com', $form->validated()['email']);
        self::assertSame(2000, strlen($form->validated()['comment']));
        self::assertSame([], $form->errors());
    }

    public function testItValidatesCsrfWhenSessionProtectionIsEnabled(): void
    {
        $_SESSION['csrf_token'] = 'expected';
        $form = new LeadFormRequest(new Request(post: [
            'name' => 'Jane', 'email' => 'jane@example.com', '_csrf_token' => 'wrong',
        ]));
        self::assertContains('The form has expired. Please refresh and try again.', $form->errors());
    }
}
