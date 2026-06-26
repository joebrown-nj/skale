<?php

namespace App\Models;

use App\Core\Contracts\EmailServiceInterface;
use App\Models\Entities\EmailListSignupsEntity;
use Doctrine\ORM\EntityManager;
use PHPMailer\PHPMailer\PHPMailer;
use Throwable;

class EmailModel implements EmailServiceInterface
{
    protected PHPMailer $mailer;
    private EntityManager $entityManager;

    public function __construct(EntityManager $entityManager, PHPMailer $mailer)
    {
        $this->entityManager = $entityManager;
        $this->mailer = $mailer;
        $this->configureTransport();

        //Recipients
        $this->mailer->setFrom($_ENV['CONTACT_FORM_FROM_EMAIL'], $_ENV['SITE_NAME']);
        // $this->mailer->addAddress($recipient, $recipientName);           //Add a recipient
        // $this->mailer->addAddress('ellen@example.com');               //Name is optional
        $this->mailer->addReplyTo($_ENV['CONTACT_FORM_REPLY_EMAIL'], $_ENV['SITE_NAME']);
        // $this->mailer->addCC('cc@example.com');
        // $this->mailer->addBCC('bcc@example.com');
    }

    /**
     * Send an email.
     *
     * @param string $to Recipient email address
     * @param string $subject Email subject
     * @param string $body Email body (HTML allowed)
     * @param string $from Sender email address
     * @param string|null $fromName Sender name
     * @return bool
     */
    public function sendEmail(string $to, string $subject, string $body, ?string $toName = null): bool
    {
        try {
            $this->mailer->clearAllRecipients();
            $this->mailer->clearAttachments();
            $this->mailer->isHTML(true);
            $this->mailer->addAddress($to, $toName);
            $this->mailer->Subject = $subject;
            $this->mailer->Body = $body;

            return $this->mailer->send();
        } catch (Throwable $e) {
            // Log error or handle as needed
            error_log($e->getMessage());
            return false;
        }
    }

    public function emailListUnsubscribe(string $email): bool
    {
        try {
            $signup = $this->entityManager
                ->getRepository(EmailListSignupsEntity::class)
                ->findOneBy(['email' => $email]);

            if ($signup === null) {
                return false;
            }

            $this->entityManager->remove($signup);
            $this->entityManager->flush();

            return true;
        } catch (Throwable $e) {
            error_log($e->getMessage());
            return false;
        }
    }
 
    public function processEmailListSignup(array $data): bool
    {
        try {
            $email = new EmailListSignupsEntity();
            $email->setemail($data['email']);
            $email->setuserInfo($data['userInfo'] ?? null);

            $this->entityManager->persist($email);
            $this->entityManager->flush();
            return true;
        } catch (Throwable $e) {
            error_log($e->getMessage());
            return false;
        }
    }

    public function checkIfEmailIsOnList(string $email): bool {
        $exists = $this->entityManager->getRepository(EmailListSignupsEntity::class)->findOneBy(['email' => $email]);
        if($exists) return true;
        return false;
    }
 
    public function validateEmail(string $email): bool {
        return (bool) filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    public function emailListSignup(array $data, ?array $user): bool
    {
        $email = $data['email'] ?? '';

        if (!$this->validateEmail($email)) {
            return false;
        }

        if ($this->checkIfEmailIsOnList($email)) {
            return false;
        }

        $payload = [
            'email' => $email,
            'userInfo' => json_encode($user),
        ];

        return $this->processEmailListSignup($payload);
    }

    public function emailTemplate(string $content = '', string $email = ''): string
    {
        return $this->emailHeader().'<table role="presentation" border="0" cellpadding="0" cellspacing="0" class="body">
      <tr>
        <td>&nbsp;</td>
        <td class="container">
          <div class="content">

            <!-- START CENTERED WHITE CONTAINER -->
            <span class="preheader">This is preheader text. Some clients will show this text as a preview.</span>
            <table role="presentation" border="0" cellpadding="0" cellspacing="0" class="main">

              <!-- START MAIN CONTENT AREA -->
              <tr>
                <td class="header" valign="middle" style="vertical-align: middle;">
                    <a href="'.$_ENV['SITE_URL'].'">
                        <img style="max-width:150px;" src="'.$_ENV['SITE_URL'].'images/logo-email.png" alt="'.$_ENV['SITE_NAME'].'">
                    </a>
                </td>
                <td class="header" valign="middle" style="vertical-align: middle;">
                    <a href="'.$_ENV['SITE_URL'].'" style="display:inline-block;">
                        <img style="max-height:20px;" src="'.$_ENV['SITE_URL'].'images/home-icon.gif" alt="'.$_ENV['SITE_NAME'].'">
                    </a>
                </td>
              </tr>
              <tr>
                <td class="wrapper">
                  '.$content.'
                  <p>
                    <a href="tel:'.$_ENV['SITE_PHONE'].'" title="Call '.$_ENV['SITE_NAME'].' '.$_ENV['SITE_PHONE'].'">
                        <img style="max-height:15px;" src="'.$_ENV['SITE_URL'].'images/phone-icon.gif" alt="Phone icon">
                        '.$_ENV['SITE_PHONE'].'
                    </a>

                    <br>

                    <a href="mailto:'.$_ENV['SITE_EMAIL'].'" title="Email '.$_ENV['SITE_NAME'].' '.$_ENV['SITE_EMAIL'].'">
                        <img style="max-height:10px;" src="'.$_ENV['SITE_URL'].'images/email-icon.gif" alt="Email icon">
                        '.$_ENV['SITE_EMAIL'].'
                    </a>
                  </p>
                </td>
              </tr>
              <!-- END MAIN CONTENT AREA -->
              </table>

            <!-- START FOOTER -->
            <div class="footer">
              <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td class="footer-content-block">
                    <a href="'.$_ENV['SITE_URL'].'unsubscribe?email='.$email.'">Unsubscribe</a>
                  </td>
                </tr>
              </table>
            </div>

            <!-- END FOOTER -->
            
<!-- END CENTERED WHITE CONTAINER --></div>
        </td>
        <td>&nbsp;</td>
      </tr>
    </table>
  </body>
</html>';

    }

    private function emailHeader()
    {
        return '<!doctype html><html lang="en"><head><meta name="viewport" content="width=device-width, initial-scale=1.0"><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"><title>Simple Transactional Email</title><style media="all" type="text/css">body{font-family:Helvetica,sans-serif;-webkit-font-smoothing:antialiased;font-size:16px;line-height:1.3;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%}table{border-collapse:separate;mso-table-lspace:0pt;mso-table-rspace:0pt;width:100%}table td{font-family:Helvetica,sans-serif;font-size:16px;vertical-align:top}body{background-color:#1b1f22;margin:0;padding:0}.body{background-color:#1b1f22;width:100%}.header{background-color:#1b1f22;padding:14px}.footer-content-block{padding:14px;font-size:12px}.footer-content-block a{font-size:12px;text-decoration:underline}.container{margin:0 auto!important;max-width:600px;padding:0;padding-top:24px;width:600px}.content{box-sizing:border-box;display:block;margin:0 auto;max-width:600px;padding:0}.main{background:#fff;border:1px solid #eaebed;border-radius:6px;width:100%}.wrapper{box-sizing:border-box;padding:24px}.footer{clear:both;padding-top:24px;text-align:center;width:100%}.footer td,.footer p,.footer span,.footer a{color:#9a9ea6;font-size:16px;text-align:center}p{font-family:Helvetica,sans-serif;font-size:18px;font-weight:400;margin:0;margin-bottom:20px;line-height:1.45}a{color:#fe8519;text-decoration:underline;cursor:pointer}.btn{box-sizing:border-box;min-width:100%!important;width:100%}.btn>tbody>tr>td{padding-bottom:16px}.btn table{width:auto}.btn table td{background-color:#fff;border-radius:4px;text-align:center}.btn a{background-color:#fff;border:solid 2px #0867ec;border-radius:4px;box-sizing:border-box;color:#0867ec;cursor:pointer;display:inline-block;font-size:16px;font-weight:700;margin:0;padding:12px 24px;text-decoration:none;text-transform:capitalize}.btn-primary table td{background-color:#0867ec}.btn-primary a{background-color:#0867ec;border-color:#0867ec;color:#fff}@media all{.btn-primary table td:hover{background-color:#ec0867!important}.btn-primary a:hover{background-color:#ec0867!important;border-color:#ec0867!important}}.last{margin-bottom:0}.first{margin-top:0}.align-center{text-align:center}.align-right{text-align:right}.align-left{text-align:left}.text-link{color:#0867ec!important;text-decoration:underline!important}.clear{clear:both}.mt0{margin-top:0}.mb0{margin-bottom:0}.preheader{color:#fff0;display:none;height:0;max-height:0;max-width:0;opacity:0;overflow:hidden;mso-hide:all;visibility:hidden;width:0}.powered-by a{text-decoration:none}@media only screen and (max-width:640px){.main p,.main td,.main span{font-size:16px!important}.wrapper{padding:8px!important}.content{padding:0!important}.container{padding:0!important;padding-top:8px!important;width:100%!important}.main{border-left-width:0!important;border-radius:0!important;border-right-width:0!important}.btn table{max-width:100%!important;width:100%!important}.btn a{font-size:16px!important;max-width:100%!important;width:100%!important}}@media all{.ExternalClass{width:100%}.ExternalClass,.ExternalClass p,.ExternalClass span,.ExternalClass font,.ExternalClass td,.ExternalClass div{line-height:100%}.apple-link a{color:inherit!important;font-family:inherit!important;font-size:inherit!important;font-weight:inherit!important;line-height:inherit!important;text-decoration:none!important}#MessageViewBody a{color:inherit;text-decoration:none;font-size:inherit;font-family:inherit;font-weight:inherit;line-height:inherit}}</style></head><body>';
    }

    private function configureTransport(): void
    {
        $host = $this->envString('SMTP_SERVER');
        if ($host === '') {
            return;
        }

        $this->mailer->isSMTP();
        $this->mailer->Host = $host;
        $this->mailer->SMTPAuth = $this->envBool('SMTP_AUTH', true);
        $this->mailer->Username = $this->envString('SMTP_USERNAME', $_ENV['CONTACT_FORM_FROM_EMAIL'] ?? '');
        $this->mailer->Password = $this->envString('SMTP_PASSWORD');
        $this->mailer->Port = $this->envInt('SMTP_PORT', 465);
        $this->mailer->CharSet = 'UTF-8';

        $secure = strtolower($this->envString('SMTP_SECURE', 'ssl'));
        if ($secure === 'tls' || $secure === 'starttls') {
            $this->mailer->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            return;
        }

        if ($secure === 'ssl' || $secure === 'smtps') {
            $this->mailer->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        }
    }

    private function envString(string $key, string $default = ''): string
    {
        $value = $_ENV[$key] ?? $default;
        return is_string($value) ? trim($value) : $default;
    }

    private function envBool(string $key, bool $default = false): bool
    {
        $value = $_ENV[$key] ?? null;
        if ($value === null || $value === '') {
            return $default;
        }

        if (is_bool($value)) {
            return $value;
        }

        $parsed = filter_var($value, FILTER_VALIDATE_BOOL, FILTER_NULL_ON_FAILURE);
        return $parsed ?? $default;
    }

    private function envInt(string $key, int $default): int
    {
        $value = $_ENV[$key] ?? null;
        if ($value === null || $value === '') {
            return $default;
        }

        $parsed = filter_var($value, FILTER_VALIDATE_INT);
        return $parsed === false ? $default : $parsed;
    }

}
