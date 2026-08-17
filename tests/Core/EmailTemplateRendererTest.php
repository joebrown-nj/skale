<?php

declare(strict_types=1);

namespace Tests\Core;

use App\Core\Config\SiteConfig;
use App\Core\EmailTemplateRenderer;
use PHPUnit\Framework\TestCase;
use Smarty\Smarty;

final class EmailTemplateRendererTest extends TestCase
{
    public function testRendersTheDocumentAndRepeatedServiceCardsFromSmartyTemplates(): void
    {
        $site = new SiteConfig('Example Co', 'https://example.com', 'hello@example.com', '555-0100', 10);
        $smarty = new Smarty();
        $compileDirectory = sys_get_temp_dir() . '/skaleup-smarty-' . bin2hex(random_bytes(6));
        mkdir($compileDirectory, 0777, true);
        $_ENV['SMARTY_TEMPLATE_C_DIR'] = $compileDirectory;
        $_ENV['SMARTY_CACHE'] = $compileDirectory;

        try {
            $html = (new EmailTemplateRenderer($smarty, $site))->render('<p>Hello Ada</p>', 'ada@example.com');
        } finally {
            foreach (glob($compileDirectory . '/*') ?: [] as $file) {
                unlink($file);
            }
            rmdir($compileDirectory);
        }

        self::assertStringStartsWith('<!doctype html>', trim($html));
        self::assertStringContainsString('<p>Hello Ada</p>', $html);
        self::assertStringContainsString('https://example.com/solutions/growth-infrastructure', $html);
        self::assertStringContainsString('Websites &amp; Digital Experiences', $html);
        self::assertSame(4, substr_count($html, 'background-color:#f7faf9'));
    }
}
