<?php

declare(strict_types=1);

namespace App\Core;

use Smarty\Smarty;

final class ErrorHandler
{
    /**
     * @var list<int>
     */
    private const FATAL_ERROR_TYPES = [
        E_ERROR,
        E_PARSE,
        E_CORE_ERROR,
        E_COMPILE_ERROR,
        E_USER_ERROR,
    ];

    private static bool $registered = false;
    private static bool $isRendering = false;

    private function __construct() {}

    public static function handleException(\Throwable $e): void
    {
        self::report($e);
        self::sendHttp500Response($e);
        exit(1);
    }

    public static function handleShutdown(): void
    {
        $error = error_get_last();

        if ($error === null || ! in_array($error['type'], self::FATAL_ERROR_TYPES, true)) {
            return;
        }

        error_log(sprintf(
            'Fatal error: %s in %s on line %d',
            $error['message'],
            $error['file'],
            $error['line'],
        ));

        self::sendHttp500Response();
    }

    public static function report(\Throwable $e): void
    {
        error_log(sprintf(
            "Unhandled %s: %s in %s on line %d\nStack trace:\n%s",
            $e::class,
            $e->getMessage(),
            $e->getFile(),
            $e->getLine(),
            $e->getTraceAsString(),
        ));
    }

    public static function render500Page(?\Throwable $exception = null): string
    {
        if (self::$isRendering) {
            return self::fallbackHtml($exception);
        }

        self::$isRendering = true;

        try {
            $smarty = new Smarty();
            $smarty->caching = Smarty::CACHING_OFF;
            $smarty->setTemplateDir(self::templatePath('SMARTY_TEMPLATE_DIR', 'src/Views/templates'));
            $smarty->setCompileDir(self::templatePath('SMARTY_TEMPLATE_C_DIR', 'src/Views/templates_c'));
            $smarty->setConfigDir(self::templatePath('SMARTY_CONFIG', 'src/Views/configs'));
            $smarty->setCacheDir(self::templatePath('SMARTY_CACHE', 'src/Views/cache'));
            $smarty->assign('app_name', 'Skaleup');

            $uri = trim((string) parse_url((string) ($_SERVER['REQUEST_URI'] ?? '/'), PHP_URL_PATH), '/');
            $pages = $uri === '' ? [] : explode('/', $uri);

            $smarty->assign([
                'page' => null,
                'data' => [
                    'errorMessage' => $exception !== null ? self::detailedErrorMessage($exception) : '',
                ],
                'viewName' => 'error/500',
                'header' => true,
                'footer' => true,
                'uri' => $uri,
                'p1' => $pages[0] ?? '',
                'p2' => $pages[1] ?? '',
                'p3' => $pages[2] ?? '',
                'nav' => [],
                'footerNav' => [],
                'serviceList' => [],
            ]);

            return $smarty->fetch('error/500.tpl');
        } catch (\Throwable $e) {
            while (ob_get_level() > 0) {
                ob_end_clean();
            }

            self::report($e);

            return self::fallbackHtml($exception);
        } finally {
            self::$isRendering = false;
        }
    }

    public static function shouldShowDetailedError(?\Throwable $exception = null): bool
    {
        return $exception !== null && ! self::isProduction();
    }

    public static function detailedErrorMessage(\Throwable $exception): string
    {
        return self::formatExceptionDetails($exception);
    }

    private static function sendHttp500Response(?\Throwable $exception = null): void
    {
        self::clearOutputBuffers();

        if (! headers_sent()) {
            http_response_code(500);
            header('Content-Type: text/html; charset=UTF-8');
        }

        echo self::render500Page($exception);
    }

    private static function clearOutputBuffers(): void
    {
        while (ob_get_level() > 0) {
            ob_end_clean();
        }
    }

    private static function siteName(): string
    {
        $siteName = trim((string) ($_ENV['SITE_NAME'] ?? 'Skaleup'));

        if ($siteName === '') {
            return 'Skaleup';
        }

        return ucfirst($siteName);
    }

    private static function homeUrl(): string
    {
        $homeUrl = (string) ($_ENV['SITE_URL'] ?? $_ENV['WEB_ROOT'] ?? '/');

        return $homeUrl !== '' ? $homeUrl : '/';
    }

    private static function retryUrl(): string
    {
        $retryUrl = (string) ($_SERVER['REQUEST_URI'] ?? self::homeUrl());

        return $retryUrl !== '' ? $retryUrl : self::homeUrl();
    }

    private static function templatePath(string $envKey, string $relativePath): string
    {
        $configuredPath = trim((string) ($_ENV[$envKey] ?? ''));

        if ($configuredPath !== '') {
            return $configuredPath;
        }

        return dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . str_replace('/', DIRECTORY_SEPARATOR, $relativePath);
    }

    private static function isProduction(): bool
    {
        $appEnv = strtolower(trim((string) ($_ENV['APP_ENV'] ?? 'prod')));

        return $appEnv === '' || $appEnv === 'prod' || $appEnv === 'production';
    }

    private static function formatExceptionDetails(?\Throwable $exception): string
    {
        if ($exception === null) {
            return '';
        }

        return sprintf(
            "%s: %s\nFile: %s\nLine: %d\n\nStack trace:\n%s",
            $exception::class,
            $exception->getMessage(),
            $exception->getFile(),
            $exception->getLine(),
            $exception->getTraceAsString(),
        );
    }

    private static function fallbackHtml(?\Throwable $exception = null): string
    {
        $siteName = htmlspecialchars(self::siteName(), ENT_QUOTES, 'UTF-8');
        $homeUrl = htmlspecialchars(self::homeUrl(), ENT_QUOTES, 'UTF-8');
        $retryUrl = htmlspecialchars(self::retryUrl(), ENT_QUOTES, 'UTF-8');
        $errorDetails = self::shouldShowDetailedError($exception)
            ? htmlspecialchars(self::formatExceptionDetails($exception), ENT_QUOTES, 'UTF-8')
            : '';
        $detailsBlock = $errorDetails !== ''
            ? '<pre style="margin:24px 0 0;padding:18px;border-radius:18px;background:#f8fafc;border:1px solid #d5dce7;color:#18212f;text-align:left;white-space:pre-wrap;word-break:break-word;">' . $errorDetails . '</pre>'
            : '';

        return <<<HTML
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Server Error | {$siteName}</title>
</head>
<body style="margin:0;font-family:Arial,sans-serif;background:#f6f1e8;color:#18212f;">
    <main style="min-height:100vh;display:flex;align-items:center;justify-content:center;padding:24px;">
        <section style="max-width:640px;padding:48px;border-radius:24px;background:#fff;box-shadow:0 24px 60px rgba(24,33,47,.12);text-align:center;">
            <p style="margin:0 0 12px;font-size:14px;letter-spacing:.18em;text-transform:uppercase;color:#b45309;">500 error</p>
            <h1 style="margin:0 0 16px;font-size:52px;line-height:1;">We hit a snag.</h1>
            <p style="margin:0 0 32px;font-size:18px;line-height:1.6;">Something went wrong on our end. Please try again in a moment or head back to the homepage.</p>
            <p style="margin:0;">
                <a href="{$homeUrl}" style="display:inline-block;margin:0 8px 8px 0;padding:14px 22px;border-radius:999px;background:#18212f;color:#fff;text-decoration:none;">Go home</a>
                <a href="{$retryUrl}" style="display:inline-block;margin:0 0 8px;padding:14px 22px;border-radius:999px;border:1px solid #d5dce7;color:#18212f;text-decoration:none;">Try again</a>
            </p>
            {$detailsBlock}
        </section>
    </main>
</body>
</html>
HTML;
    }
}
