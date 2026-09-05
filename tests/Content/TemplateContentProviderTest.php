<?php

declare(strict_types=1);

namespace Tests\Content;

use App\Content\TemplateContentProvider;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

final class TemplateContentProviderTest extends TestCase
{
    public function testItLoadsTemplateContent(): void
    {
        $content = (new TemplateContentProvider())->get('blog-list');

        self::assertSame('The Skale Growth Journal', $content['text_the_skale_growth_journal']);
    }

    #[DataProvider('unsafeViewNames')]
    public function testItRejectsUnsafeViewNames(string $view): void
    {
        self::assertSame([], (new TemplateContentProvider())->get($view));
    }

    public static function unsafeViewNames(): array
    {
        return [
            ['../home'],
            ['error/404'],
            ['Home'],
        ];
    }
}
