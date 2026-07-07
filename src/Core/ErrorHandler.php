<?php
declare(strict_types=1);

namespace App\Core;

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

    private function __construct()
    {
    }

    public static function register(): void
    {
        if (self::$registered) {
            return;
        }

        set_exception_handler([self::class, 'handleException']);
        register_shutdown_function([self::class, 'handleShutdown']);

        self::$registered = true;
    }

    public static function handleException(\Throwable $e): void
    {
        self::report($e);
        self::sendHttp500Response();
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
            $error['line']
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
            $e->getTraceAsString()
        ));
    }

    public static function render500Page(): string
    {
        if (self::$isRendering) {
            return self::fallbackHtml();
        }

        self::$isRendering = true;

        try {
            $siteName = self::siteName();
            $homeUrl = self::homeUrl();
            $retryUrl = self::retryUrl();
            $templatePath = dirname(__DIR__).'/Views/errors/500.php';

            ob_start();
            require $templatePath;

            return (string) ob_get_clean();
        } catch (\Throwable $e) {
            while (ob_get_level() > 0) {
                ob_end_clean();
            }

            self::report($e);

            return self::fallbackHtml();
        } finally {
            self::$isRendering = false;
        }
    }

    private static function sendHttp500Response(): void
    {
        self::clearOutputBuffers();

        if (! headers_sent()) {
            http_response_code(500);
            header('Content-Type: text/html; charset=UTF-8');
        }

        echo self::render500Page();
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

    private static function fallbackHtml(): string
    {
        $siteName = htmlspecialchars(self::siteName(), ENT_QUOTES, 'UTF-8');
        $homeUrl = htmlspecialchars(self::homeUrl(), ENT_QUOTES, 'UTF-8');
        $retryUrl = htmlspecialchars(self::retryUrl(), ENT_QUOTES, 'UTF-8');

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
        </section>
    </main>
</body>
</html>
HTML;
    }
}
