<?php

declare(strict_types=1);

namespace Tests\Views;

use PHPUnit\Framework\TestCase;

final class TopLevelTemplateContentTest extends TestCase
{
    public function testTopLevelTemplatesDoNotContainLiteralText(): void
    {
        $files = glob(dirname(__DIR__, 2) . '/src/Views/templates/*.tpl') ?: [];

        foreach ($files as $file) {
            $template = (string) file_get_contents($file);
            $template = preg_replace('/\{[^{}]*\}/s', '', $template) ?? $template;
            preg_match_all('/>([^<>]+)</s', $template, $matches);

            foreach ($matches[1] as $text) {
                self::assertSame('', trim($text), sprintf('%s contains literal text: %s', basename($file), trim($text)));
            }

            preg_match_all('/\b(?:alt|title|placeholder|aria-label)=("|\')([^"\']+)\1/i', $template, $attributes);
            foreach ($attributes[2] as $text) {
                self::assertSame('', trim($text), sprintf('%s contains a literal text attribute: %s', basename($file), $text));
            }
        }
    }
}
