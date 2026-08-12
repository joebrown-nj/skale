<?php
declare(strict_types=1);

namespace App\Core\Config;

use InvalidArgumentException;

final class ConfigurationFactory
{
    /** @param array<string, mixed> $environment */
    public static function fromEnvironment(array $environment, string $projectRoot): ApplicationConfig
    {
        $appEnvironment = strtolower(self::string($environment, 'APP_ENV', 'prod'));
        $developmentMode = in_array($appEnvironment, ['dev', 'development', 'local', 'test'], true);

        $database = new DatabaseConfig(
            self::required($environment, 'DB_NAME'),
            self::required($environment, 'DB_HOST'),
            self::required($environment, 'DB_USER'),
            self::required($environment, 'DB_PASS', allowEmpty: true),
            self::string($environment, 'DB_DRIVER', 'pdo_mysql'),
            $developmentMode,
            $projectRoot.'/var/cache/doctrine/proxies',
        );

        $site = new SiteConfig(
            self::required($environment, 'SITE_NAME'),
            rtrim(self::required($environment, 'SITE_URL'), '/').'/',
            self::email($environment, 'SITE_EMAIL'),
            self::string($environment, 'SITE_PHONE'),
            self::positiveInt($environment, 'BLOG_ITEMS_PER_PAGE', 9),
        );

        $mail = new MailConfig(
            self::string($environment, 'SMTP_SERVER'),
            self::port($environment, 'SMTP_PORT', 465),
            self::bool($environment, 'SMTP_AUTH', true),
            self::string($environment, 'SMTP_USERNAME', self::string($environment, 'CONTACT_FORM_FROM_EMAIL')),
            self::string($environment, 'SMTP_PASSWORD'),
            self::encryption($environment),
            self::email($environment, 'CONTACT_FORM_FROM_EMAIL'),
            self::email($environment, 'CONTACT_FORM_REPLY_EMAIL'),
            self::email($environment, 'CONTACT_FORM_MY_EMAIL'),
        );

        return new ApplicationConfig(
            $appEnvironment,
            $database,
            $mail,
            $site,
            new EmailQueueConfig(
                self::bool($environment, 'EMAIL_QUEUE_ENABLED', false),
                self::string($environment, 'EMAIL_QUEUE_DIR', $projectRoot.'/var/email-queue'),
                self::positiveInt($environment, 'EMAIL_QUEUE_MAX_ATTEMPTS', 5),
                self::positiveInt($environment, 'EMAIL_QUEUE_PROCESSING_TIMEOUT', 900, 60),
            ),
        );
    }

    /** @param array<string, mixed> $env */
    private static function required(array $env, string $key, bool $allowEmpty = false): string
    {
        if (!array_key_exists($key, $env)) {
            throw new InvalidArgumentException('Missing required environment variable '.$key.'.');
        }
        $value = is_scalar($env[$key]) ? trim((string) $env[$key]) : '';
        if (!$allowEmpty && $value === '') {
            throw new InvalidArgumentException('Environment variable '.$key.' cannot be empty.');
        }
        return $value;
    }

    /** @param array<string, mixed> $env */
    private static function string(array $env, string $key, string $default = ''): string
    {
        $value = $env[$key] ?? $default;
        return is_scalar($value) ? trim((string) $value) : $default;
    }

    /** @param array<string, mixed> $env */
    private static function bool(array $env, string $key, bool $default): bool
    {
        if (!isset($env[$key]) || $env[$key] === '') return $default;
        $value = filter_var($env[$key], FILTER_VALIDATE_BOOL, FILTER_NULL_ON_FAILURE);
        if ($value === null) throw new InvalidArgumentException('Environment variable '.$key.' must be a boolean.');
        return $value;
    }

    /** @param array<string, mixed> $env */
    private static function positiveInt(array $env, string $key, int $default, int $minimum = 1): int
    {
        $raw = $env[$key] ?? $default;
        $value = filter_var($raw, FILTER_VALIDATE_INT);
        if ($value === false || $value < $minimum) {
            throw new InvalidArgumentException(sprintf('Environment variable %s must be an integer of at least %d.', $key, $minimum));
        }
        return $value;
    }

    /** @param array<string, mixed> $env */
    private static function port(array $env, string $key, int $default): int
    {
        $port = self::positiveInt($env, $key, $default);
        if ($port > 65535) throw new InvalidArgumentException('Environment variable '.$key.' must be a valid TCP port.');
        return $port;
    }

    /** @param array<string, mixed> $env */
    private static function email(array $env, string $key): string
    {
        $email = self::required($env, $key);
        if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
            throw new InvalidArgumentException('Environment variable '.$key.' must be a valid email address.');
        }
        return $email;
    }

    /** @param array<string, mixed> $env */
    private static function encryption(array $env): string
    {
        $value = strtolower(self::string($env, 'SMTP_SECURE', 'ssl'));
        if (!in_array($value, ['', 'ssl', 'smtps', 'tls', 'starttls'], true)) {
            throw new InvalidArgumentException('Environment variable SMTP_SECURE must be ssl, tls, or empty.');
        }
        return $value;
    }
}
