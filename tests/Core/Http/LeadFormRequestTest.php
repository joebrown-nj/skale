<?php

declare(strict_types=1);

namespace Tests\Core\Http;

use App\Core\Http\Form\LeadFormRequest;
use App\Core\Http\Request;
use PHPUnit\Framework\TestCase;

final class LeadFormRequestTest extends TestCase
{
    protected function tearDown(): void
    {
        unset($_SESSION['csrf_token']);
    }

    public function testItNormalizesAndLimitsInput(): void
    {
        $form = new LeadFormRequest(new Request(post: [
            'name' => '  Jane   Doe ',
            'email' => ' JANE@EXAMPLE.COM ',
            'website' => ' https://example.com ',
            'website_goal' => ' more-leads ',
            'package' => ' website-rescue ',
            'lead_source' => ' website-development-ab-version-b ',
            'comment' => str_repeat('x', 2100),
        ]));
        self::assertSame('Jane Doe', $form->validated()['name']);
        self::assertSame('jane@example.com', $form->validated()['email']);
        self::assertSame('https://example.com', $form->validated()['website']);
        self::assertSame('more-leads', $form->validated()['website_goal']);
        self::assertSame('website-rescue', $form->validated()['package']);
        self::assertSame('website-development-ab-version-b', $form->validated()['lead_source']);
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
