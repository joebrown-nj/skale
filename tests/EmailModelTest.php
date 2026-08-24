<?php

declare(strict_types=1);

use App\Core\Config\MailConfig;
use App\Core\Config\SiteConfig;
use App\Models\EmailModel;
use Doctrine\ORM\EntityManager;
use PHPMailer\PHPMailer\PHPMailer;
use PHPUnit\Framework\TestCase;

final class EmailModelTest extends TestCase
{
    public function testSendEmailIsSuppressedWhileDeliveryIsDisabled(): void
    {
        $entityManager = $this->createStub(EntityManager::class);
        $mailer = new class(true) extends PHPMailer {
            public bool $sendCalled = false;

            public function send(): bool
            {
                $this->sendCalled = true;

                return parent::send();
            }
        };
        $model = new EmailModel(
            $entityManager,
            $mailer,
            new MailConfig('', 587, false, '', '', 'tls', 'from@example.com', 'reply@example.com', 'admin@example.com'),
            new SiteConfig('Skale', 'https://example.com', 'admin@example.com', '555-0100', 10),
        );

        $this->assertTrue($model->sendEmail('lead@example.com', 'New lead', '<p>Hello</p>'));
        $this->assertFalse($mailer->sendCalled);
    }

    public function testConfigureTransportDoesNotCreateDeprecatedDynamicProperty(): void
    {
        $entityManager = $this->createStub(EntityManager::class);
        $mailer = new PHPMailer(true);
        $mailConfig = new MailConfig(
            host: 'smtp.example.com',
            port: 587,
            authentication: true,
            username: 'user@example.com',
            password: 'secret',
            encryption: 'tls',
            fromAddress: 'from@example.com',
            replyToAddress: 'reply@example.com',
            adminAddress: 'admin@example.com',
        );
        $siteConfig = new SiteConfig(
            name: 'Skale',
            url: 'https://example.com',
            email: 'admin@example.com',
            phone: '555-0100',
            blogItemsPerPage: 10,
        );

        $deprecations = [];
        set_error_handler(static function (int $errno, string $errstr) use (&$deprecations): bool {
            if (($errno & (E_DEPRECATED | E_USER_DEPRECATED)) !== 0) {
                $deprecations[] = $errstr;
                return true;
            }
            return false;
        });

        try {
            new EmailModel($entityManager, $mailer, $mailConfig, $siteConfig);
        } finally {
            restore_error_handler();
        }

        $this->assertSame([], $deprecations);
        $this->assertSame(5, $mailer->Timeout);
        $this->assertSame(8, $mailer->getSMTPInstance()->Timelimit);
        $this->assertFalse($mailer->SMTPKeepAlive);
    }
}
