<?php

namespace App\Models;

use App\Core\Contracts\EmailServiceInterface;
use App\Core\Config\MailConfig;
use App\Core\Config\SiteConfig;
use App\Models\Entities\EmailListSignupsEntity;
use Doctrine\ORM\EntityManager;
use PHPMailer\PHPMailer\PHPMailer;
use Throwable;

class EmailModel implements EmailServiceInterface
{
  private const SMTP_TIMEOUT_SECONDS = 20;
  private const SMTP_CONNECTION_TIMEOUT_SECONDS = 30;

    protected PHPMailer $mailer;
    private EntityManager $entityManager;
    private ?string $lastSendError = null;
    private MailConfig $mailConfig;
    private SiteConfig $siteConfig;

    public function __construct(EntityManager $entityManager, PHPMailer $mailer, MailConfig $mailConfig, SiteConfig $siteConfig)
    {
        $this->entityManager = $entityManager;
        $this->mailer = $mailer;
        $this->mailConfig = $mailConfig;
        $this->siteConfig = $siteConfig;
        $this->configureTransport();

        //Recipients
        $this->mailer->setFrom($mailConfig->fromAddress, $siteConfig->name);
        // $this->mailer->addAddress($recipient, $recipientName);           //Add a recipient
        // $this->mailer->addAddress('ellen@example.com');               //Name is optional
        $this->mailer->addReplyTo($mailConfig->replyToAddress, $siteConfig->name);
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
        $this->lastSendError = null;

        try {
        if ($this->sendWithCurrentTransport($to, $subject, $body, $toName)) {
                return true;
            }

            $this->lastSendError = $this->mailer->ErrorInfo !== ''
                ? $this->mailer->ErrorInfo
                : 'PHPMailer returned false without an error message.';

        if ($this->shouldRetryWithStartTls($this->lastSendError) && $this->sendUsingStartTlsFallback($to, $subject, $body, $toName)) {
          return true;
        }

        if ($this->shouldRetryWithStartTls($this->lastSendError) && $this->sendUsingIpv4Fallback($to, $subject, $body, $toName)) {
          return true;
        }

            error_log('[email] Send failed for '.$this->redactEmail($to).': '.$this->lastSendError);

            return false;
        } catch (Throwable $e) {
            $mailerError = trim($this->mailer->ErrorInfo);
            $this->lastSendError = $e->getMessage();
            if ($mailerError !== '' && !str_contains($this->lastSendError, $mailerError)) {
                $this->lastSendError .= ' (PHPMailer: '.$mailerError.')';
            }

        if ($this->shouldRetryWithStartTls($this->lastSendError) && $this->sendUsingStartTlsFallback($to, $subject, $body, $toName)) {
          return true;
        }

        if ($this->shouldRetryWithStartTls($this->lastSendError) && $this->sendUsingIpv4Fallback($to, $subject, $body, $toName)) {
          return true;
        }

            error_log('[email] Send failed for '.$this->redactEmail($to).': '.$this->lastSendError);
            return false;
        }
    }

    private function sendWithCurrentTransport(string $to, string $subject, string $body, ?string $toName): bool
    {
      $this->mailer->clearAllRecipients();
      $this->mailer->clearAttachments();
      $this->mailer->isHTML(true);
      $this->mailer->addAddress($to, $toName);
      $this->mailer->Subject = $subject;
      $this->mailer->Body = $body;

      return $this->mailer->send();
    }

    private function shouldRetryWithStartTls(?string $errorMessage): bool
    {
      if ($errorMessage === null || $errorMessage === '') {
        return false;
      }

      $message = strtolower($errorMessage);
      $timedOut = str_contains($message, 'connection timed out') || str_contains($message, 'smtp code: 110');
      $connectFailure = str_contains($message, 'could not connect to smtp host') || str_contains($message, 'failed to connect to server');

      return $timedOut && $connectFailure;
    }

    private function sendUsingStartTlsFallback(string $to, string $subject, string $body, ?string $toName): bool
    {
      if ($this->mailConfig->host === '') {
        return false;
      }

      if (strtolower($this->mailConfig->encryption) === 'tls' || strtolower($this->mailConfig->encryption) === 'starttls') {
        return false;
      }

      if ($this->mailConfig->port === 587 && strtolower($this->mailConfig->encryption) !== 'ssl' && strtolower($this->mailConfig->encryption) !== 'smtps') {
        return false;
      }

      $this->mailer->Port = 587;
      $this->mailer->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

      try {
        if (!$this->sendWithCurrentTransport($to, $subject, $body, $toName)) {
          $fallbackError = $this->mailer->ErrorInfo !== ''
            ? $this->mailer->ErrorInfo
            : 'PHPMailer returned false without an error message during STARTTLS fallback.';
          $this->lastSendError .= ' | STARTTLS fallback failed: '.$fallbackError;
          return false;
        }

        error_log('[email] STARTTLS fallback succeeded after SMTP timeout on '.$this->mailConfig->host.'.');
        return true;
      } catch (Throwable $e) {
        $fallbackError = trim($this->mailer->ErrorInfo);
        $errorMessage = $e->getMessage();
        if ($fallbackError !== '' && !str_contains($errorMessage, $fallbackError)) {
          $errorMessage .= ' (PHPMailer: '.$fallbackError.')';
        }

        $this->lastSendError .= ' | STARTTLS fallback exception: '.$errorMessage;
        return false;
      }
    }

    private function sendUsingIpv4Fallback(string $to, string $subject, string $body, ?string $toName): bool
    {
      if ($this->mailConfig->host === '') {
        return false;
      }

      $originalHost = $this->mailConfig->host;
      $resolvedHost = gethostbyname($originalHost);

      if ($resolvedHost === '' || $resolvedHost === $originalHost) {
        return false;
      }

      $this->mailer->Host = $resolvedHost;
      $this->mailer->Port = 587;
      $this->mailer->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
      $this->mailer->SMTPOptions = [
        'ssl' => [
          'peer_name' => $originalHost,
          'verify_peer' => true,
          'verify_peer_name' => true,
          'allow_self_signed' => false,
        ],
      ];

      try {
        if (!$this->sendWithCurrentTransport($to, $subject, $body, $toName)) {
          $fallbackError = $this->mailer->ErrorInfo !== ''
            ? $this->mailer->ErrorInfo
            : 'PHPMailer returned false without an error message during IPv4 fallback.';
          $this->lastSendError .= ' | IPv4 fallback failed: '.$fallbackError;
          return false;
        }

        error_log('[email] IPv4 STARTTLS fallback succeeded using '.$resolvedHost.' for '.$originalHost.'.');
        return true;
      } catch (Throwable $e) {
        $fallbackError = trim($this->mailer->ErrorInfo);
        $errorMessage = $e->getMessage();
        if ($fallbackError !== '' && !str_contains($errorMessage, $fallbackError)) {
          $errorMessage .= ' (PHPMailer: '.$fallbackError.')';
        }

        $this->lastSendError .= ' | IPv4 fallback exception: '.$errorMessage;
        return false;
      } finally {
        $this->mailer->Host = $originalHost;
      }
    }

    public function getLastSendError(): ?string
    {
        return $this->lastSendError;
    }

    private function redactEmail(string $email): string
    {
        $at = strrpos($email, '@');
        if ($at === false) {
            return '[invalid address]';
        }

        return substr($email, 0, 1).'***'.substr($email, $at);
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
//         return $this->emailHeader().'<table role="presentation" border="0" cellpadding="0" cellspacing="0" class="body">
//       <tr>
//         <td>&nbsp;</td>
//         <td class="container">
//           <div class="content">

//             <!-- START CENTERED WHITE CONTAINER -->
//             <span class="preheader">This is preheader text. Some clients will show this text as a preview.</span>
//             <table role="presentation" border="0" cellpadding="0" cellspacing="0" class="main">

//               <!-- START MAIN CONTENT AREA -->
//               <tr>
//                 <td class="header" valign="middle" style="vertical-align: middle;">
//                     <a href="'.$this->siteConfig->url.'">
//                         <img style="max-width:150px;" src="'.$this->siteConfig->url.'images/logo-email.png" alt="'.$this->siteConfig->name.'">
//                     </a>
//                 </td>
//                 <td class="header" valign="middle" style="vertical-align: middle;">
//                     <a href="'.$this->siteConfig->url.'" style="display:inline-block;">
//                         <img style="max-height:20px;" src="'.$this->siteConfig->url.'images/home-icon.gif" alt="'.$this->siteConfig->name.'">
//                     </a>
//                 </td>
//               </tr>
//               <tr>
//                 <td class="wrapper">
//                   '.$content.'
//                   <p>
//                     <a href="tel:'.$this->siteConfig->phone.'" title="Call '.$this->siteConfig->name.' '.$this->siteConfig->phone.'">
//                         <img style="max-height:15px;" src="'.$this->siteConfig->url.'images/phone-icon.gif" alt="Phone icon">
//                         '.$this->siteConfig->phone.'
//                     </a>

//                     <br>

//                     <a href="mailto:'.$this->siteConfig->email.'" title="Email '.$this->siteConfig->name.' '.$this->siteConfig->email.'">
//                         <img style="max-height:10px;" src="'.$this->siteConfig->url.'images/email-icon.gif" alt="Email icon">
//                         '.$this->siteConfig->email.'
//                     </a>
//                   </p>
//                 </td>
//               </tr>
//               <!-- END MAIN CONTENT AREA -->
//               </table>

//             <!-- START FOOTER -->
//             <div class="footer">
//               <table role="presentation" border="0" cellpadding="0" cellspacing="0">
//                 <tr>
//                   <td class="footer-content-block">
//                     <a href="'.$this->siteConfig->url.'unsubscribe?email='.$email.'">Unsubscribe</a>
//                   </td>
//                 </tr>
//               </table>
//             </div>

//             <!-- END FOOTER -->
            
// <!-- END CENTERED WHITE CONTAINER --></div>
//         </td>
//         <td>&nbsp;</td>
//       </tr>
//     </table>
//   </body>
// </html>';

$formattedContent = $content != '' ? '<div style="
                                padding-top:18px;
                                color:#4b5563;
                                font-family:Arial, Helvetica, sans-serif;
                                font-size:17px;
                                line-height:27px;
                            ">'.$content.'</div>' : '';

return '<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="x-apple-disable-message-reformatting">
    <meta name="format-detection" content="telephone=no,address=no,email=no,date=no,url=no">
    <title>Thanks for contacting Skale</title>
    <style>
      /* Some clients support these styles. Critical styles are also inline. */
      body {
        margin: 0 !important;
        padding: 0 !important;
        width: 100% !important;
        background-color: #f4f7f9;
      }

      table {
        border-collapse: collapse !important;
      }

      img {
        border: 0;
        outline: none;
        text-decoration: none;
        display: block;
      }

      a {
        text-decoration: none;
      }

      @media only screen and (max-width: 620px) {
        .email-container {
          width: 100% !important;
        }

        .mobile-padding {
          padding-left: 24px !important;
          padding-right: 24px !important;
        }

        .mobile-full {
          width: 100% !important;
          display: block !important;
        }

        .mobile-center {
          text-align: center !important;
        }

        .headline {
          font-size: 28px !important;
          line-height: 34px !important;
        }
      }
    </style>
  </head>
  <body style="margin:0; padding:0; background-color:#f4f7f9;">
    <!-- Hidden Preheader -->
    <div style="display:none; font-size:1px; color:#f4f7f9; line-height:1px; max-height:0; max-width:0; opacity:0; overflow:hidden;"> Thanks for reaching out to Skale. We received your message and will be in touch soon. </div>
    <!-- Full Background -->
    <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" style="width:100%; background-color:#f4f7f9;">
      <tr>
        <td align="center" style="padding:32px 12px;">
          <!-- Email Container -->
          <table role="presentation" class="email-container" width="600" cellspacing="0" cellpadding="0" border="0" style="width:600px; max-width:600px; background-color:#ffffff;">
            <!-- Header -->
            <tr>
              <td class="mobile-padding" style="
                            padding:30px 40px;
                            background-color:#07111f;
                            font-family:Arial, Helvetica, sans-serif;
                        ">
                <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0">
                  <tr>
                    <td style="
                                        color:#ffffff;
                                        font-family:Arial, Helvetica, sans-serif;
                                        font-size:27px;
                                        line-height:32px;
                                        font-weight:bold;
                                    ">
                      <a href="https://skaleup.it.com/" target="_blank" style="text-decoration:none; color:inherit;">Skale<span style="color:#2ee6a6;">.</span></a>
                    </td>
                  </tr>
                  <tr>
                    <td style="
                                        padding-top:5px;
                                        color:#aebbc9;
                                        font-family:Arial, Helvetica, sans-serif;
                                        font-size:13px;
                                        line-height:18px;
                                    "> Where Engineering Meets Growth </td>
                  </tr>
                </table>
              </td>
            </tr>
            <!-- Hero -->
            <tr>
              <td class="mobile-padding" style="
                            padding:48px 40px 24px 40px;
                            font-family:Arial, Helvetica, sans-serif;
                        ">
                <div class="headline" style="
                                color:#07111f;
                                font-family:Arial, Helvetica, sans-serif;
                                font-size:34px;
                                line-height:41px;
                                font-weight:bold;
                                margin:0;
                            "> Thanks for reaching out. </div>
                '.$formattedContent.'
                <div style="
                                padding-top:18px;
                                color:#4b5563;
                                font-family:Arial, Helvetica, sans-serif;
                                font-size:17px;
                                line-height:27px;
                            "> We&#39;ve received your message and will review the details you&#39;ve shared. You can expect to hear from us soon. </div>
              </td>
            </tr>
            <!-- Intro -->
            <tr>
              <td class="mobile-padding" style="
                            padding:0 40px 34px 40px;
                            color:#4b5563;
                            font-family:Arial, Helvetica, sans-serif;
                            font-size:16px;
                            line-height:26px;
                        "> At Skale, we help businesses solve technology problems, improve the way their systems work together, and build infrastructure that supports long-term growth. </td>
            </tr>
            <!-- Divider -->
            <tr>
              <td style="padding:0 40px;">
                <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0">
                  <tr>
                    <td style="height:1px; background-color:#e5e7eb; font-size:1px; line-height:1px;"> &nbsp; </td>
                  </tr>
                </table>
              </td>
            </tr>
            <!-- Services Intro -->
            <tr>
              <td class="mobile-padding" style="
                            padding:34px 40px 16px 40px;
                            color:#07111f;
                            font-family:Arial, Helvetica, sans-serif;
                            font-size:21px;
                            line-height:28px;
                            font-weight:bold;
                        "> While you&#39;re here, here&#39;s how we can help. </td>
            </tr>
            <!-- Service 1 -->
            <tr>
              <td class="mobile-padding" style="padding:8px 40px;">
                <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" style="background-color:#f7faf9;">
                  <tr>
                    <td style="padding:20px;">
                      <a href="https://skaleup.it.com/solutions/growth-infrastructure" target="_blank" style="text-decoration:none; color:inherit;">
                        <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0">
                            <tr>
                            <td width="38" valign="top" style="
                                                        width:38px;
                                                        color:#16a673;
                                                        font-family:Arial, Helvetica, sans-serif;
                                                        font-size:22px;
                                                        font-weight:bold;
                                                    "> 01 </td>
                            <td style="
                                                        color:#07111f;
                                                        font-family:Arial, Helvetica, sans-serif;
                                                        font-size:16px;
                                                        line-height:23px;
                                                        font-weight:bold;
                                                    "> Websites &amp; Digital Experiences <div style="
                                                            padding-top:5px;
                                                            color:#65717d;
                                                            font-size:14px;
                                                            line-height:22px;
                                                            font-weight:normal;
                                                        "> Website development, performance improvements, conversion optimization, SEO, and analytics. </div>
                            </td>
                            </tr>
                        </table>
                      </a>
                    </td>
                  </tr>
                </table>
              </td>
            </tr>
            <!-- Service 2 -->
            <tr>
              <td class="mobile-padding" style="padding:8px 40px;">
                <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" style="background-color:#f7faf9;">
                  <tr>
                    <td style="padding:20px;">
                      <a href="https://skaleup.it.com/solutions/automation-software" target="_blank" style="text-decoration:none; color:inherit;">
                        <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0">
                            <tr>
                            <td width="38" valign="top" style="
                                                        width:38px;
                                                        color:#16a673;
                                                        font-family:Arial, Helvetica, sans-serif;
                                                        font-size:22px;
                                                        font-weight:bold;
                                                    "> 02 </td>
                            <td style="
                                                        color:#07111f;
                                                        font-family:Arial, Helvetica, sans-serif;
                                                        font-size:16px;
                                                        line-height:23px;
                                                        font-weight:bold;
                                                    "> Automation &amp; Software <div style="
                                                            padding-top:5px;
                                                            color:#65717d;
                                                            font-size:14px;
                                                            line-height:22px;
                                                            font-weight:normal;
                                                        "> Workflow automation, custom software, system integrations, and solutions that eliminate repetitive work. </div>
                            </td>
                            </tr>
                        </table>
                      </a>
                    </td>
                  </tr>
                </table>
              </td>
            </tr>
            <!-- Service 3 -->
            <tr>
              <td class="mobile-padding" style="padding:8px 40px;">
                <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" style="background-color:#f7faf9;">
                  <tr>
                    <td style="padding:20px;">
                      <a href="https://skaleup.it.com/solutions/demand-generation" target="_blank" style="text-decoration:none; color:inherit;">
                        <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0">
                            <tr>
                            <td width="38" valign="top" style="
                                                        width:38px;
                                                        color:#16a673;
                                                        font-family:Arial, Helvetica, sans-serif;
                                                        font-size:22px;
                                                        font-weight:bold;
                                                    "> 03 </td>
                            <td style="
                                                        color:#07111f;
                                                        font-family:Arial, Helvetica, sans-serif;
                                                        font-size:16px;
                                                        line-height:23px;
                                                        font-weight:bold;
                                                    "> Marketing &amp; Growth <div style="
                                                            padding-top:5px;
                                                            color:#65717d;
                                                            font-size:14px;
                                                            line-height:22px;
                                                            font-weight:normal;
                                                        "> PPC, email marketing, digital marketing, conversion strategy, and reporting focused on measurable results. </div>
                            </td>
                            </tr>
                        </table>
                      </a>
                    </td>
                  </tr>
                </table>
              </td>
            </tr>
            <!-- Service 4 -->
            <tr>
              <td class="mobile-padding" style="padding:8px 40px 34px 40px;">
                <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" style="background-color:#f7faf9;">
                  <tr>
                    <td style="padding:20px;">
                      <a href="https://skaleup.it.com/solutions/strategy-and-optimization" target="_blank" style="text-decoration:none; color:inherit;">
                        <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0">
                            <tr>
                            <td width="38" valign="top" style="
                                                        width:38px;
                                                        color:#16a673;
                                                        font-family:Arial, Helvetica, sans-serif;
                                                        font-size:22px;
                                                        font-weight:bold;
                                                    "> 04 </td>
                            <td style="
                                                        color:#07111f;
                                                        font-family:Arial, Helvetica, sans-serif;
                                                        font-size:16px;
                                                        line-height:23px;
                                                        font-weight:bold;
                                                    "> Technology Strategy <div style="
                                                            padding-top:5px;
                                                            color:#65717d;
                                                            font-size:14px;
                                                            line-height:22px;
                                                            font-weight:normal;
                                                        "> Practical technology guidance designed around your business, existing systems, and growth goals. </div>
                            </td>
                            </tr>
                        </table>
                      </a>
                    </td>
                  </tr>
                </table>
              </td>
            </tr>
            <!-- CTA Section -->
            <tr>
              <td class="mobile-padding" align="center" style="
                            padding:36px 40px;
                            background-color:#eefbf6;
                            font-family:Arial, Helvetica, sans-serif;
                        ">
                <div style="
                                color:#07111f;
                                font-size:21px;
                                line-height:27px;
                                font-weight:bold;
                            "> Want to learn more while you wait? </div>
                <div style="
                                padding:9px 0 22px 0;
                                color:#53616c;
                                font-size:15px;
                                line-height:23px;
                            "> Explore how Skale helps growing businesses use technology more effectively. </div>
                <!-- Bulletproof Button -->
                <table role="presentation" cellspacing="0" cellpadding="0" border="0" align="center">
                  <tr>
                    <td align="center" bgcolor="#16a673" style="
                                        border-radius:5px;
                                        background-color:#16a673;
                                    ">
                      <a href="https://skaleup.it.com/solutions/" target="_blank" style="
                                            display:inline-block;
                                            padding:15px 26px;
                                            border:1px solid #16a673;
                                            border-radius:5px;
                                            color:#ffffff;
                                            font-family:Arial, Helvetica, sans-serif;
                                            font-size:15px;
                                            line-height:18px;
                                            font-weight:bold;
                                            text-decoration:none;
                                        "> Explore Skale Services </a>
                    </td>
                  </tr>
                </table>
              </td>
            </tr>
            <!-- Personal Close -->
            <tr>
              <td class="mobile-padding" style="
                            padding:36px 40px;
                            color:#4b5563;
                            font-family:Arial, Helvetica, sans-serif;
                            font-size:15px;
                            line-height:25px;
                        "> Thanks again for contacting us. We&#39;re looking forward to learning more about your business and what you&#39;re trying to accomplish. <div style="padding-top:22px;">
                  <strong style="color:#07111f;">Joe Brown</strong>
                  <br> Skale <br>
                  <a href="https://skaleup.it.com/" target="_blank" style="color:#168b65; text-decoration:none;">skaleup.it.com</a>
                </div>
              </td>
            </tr>
            <!-- Footer -->
            <tr>
              <td class="mobile-padding" align="center" style="
                            padding:26px 40px;
                            background-color:#07111f;
                            color:#8f9dab;
                            font-family:Arial, Helvetica, sans-serif;
                            font-size:12px;
                            line-height:19px;
                        "> This email was sent automatically because a contact form was submitted at Skale. <div style="padding-top:8px;">
                  <a href="https://skaleup.it.com/" target="_blank" style="color:#b9c7d3; text-decoration:underline;"> Visit Skale </a>
                </div>
              </td>
            </tr>
          </table>
          <!-- /Email Container -->
        </td>
      </tr>
    </table>
  </body>
</html>';

    }

    // private function emailHeader()
    // {
    //     return '<!doctype html><html lang="en"><head><meta name="viewport" content="width=device-width, initial-scale=1.0"><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"><title>Simple Transactional Email</title><style media="all" type="text/css">body{font-family:Helvetica,sans-serif;-webkit-font-smoothing:antialiased;font-size:16px;line-height:1.3;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%}table{border-collapse:separate;mso-table-lspace:0pt;mso-table-rspace:0pt;width:100%}table td{font-family:Helvetica,sans-serif;font-size:16px;vertical-align:top}body{background-color:#1b1f22;margin:0;padding:0}.body{background-color:#1b1f22;width:100%}.header{background-color:#1b1f22;padding:14px}.footer-content-block{padding:14px;font-size:12px}.footer-content-block a{font-size:12px;text-decoration:underline}.container{margin:0 auto!important;max-width:600px;padding:0;padding-top:24px;width:600px}.content{box-sizing:border-box;display:block;margin:0 auto;max-width:600px;padding:0}.main{background:#fff;border:1px solid #eaebed;border-radius:6px;width:100%}.wrapper{box-sizing:border-box;padding:24px}.footer{clear:both;padding-top:24px;text-align:center;width:100%}.footer td,.footer p,.footer span,.footer a{color:#9a9ea6;font-size:16px;text-align:center}p{font-family:Helvetica,sans-serif;font-size:18px;font-weight:400;margin:0;margin-bottom:20px;line-height:1.45}a{color:#fe8519;text-decoration:underline;cursor:pointer}.btn{box-sizing:border-box;min-width:100%!important;width:100%}.btn>tbody>tr>td{padding-bottom:16px}.btn table{width:auto}.btn table td{background-color:#fff;border-radius:4px;text-align:center}.btn a{background-color:#fff;border:solid 2px #0867ec;border-radius:4px;box-sizing:border-box;color:#0867ec;cursor:pointer;display:inline-block;font-size:16px;font-weight:700;margin:0;padding:12px 24px;text-decoration:none;text-transform:capitalize}.btn-primary table td{background-color:#0867ec}.btn-primary a{background-color:#0867ec;border-color:#0867ec;color:#fff}@media all{.btn-primary table td:hover{background-color:#ec0867!important}.btn-primary a:hover{background-color:#ec0867!important;border-color:#ec0867!important}}.last{margin-bottom:0}.first{margin-top:0}.align-center{text-align:center}.align-right{text-align:right}.align-left{text-align:left}.text-link{color:#0867ec!important;text-decoration:underline!important}.clear{clear:both}.mt0{margin-top:0}.mb0{margin-bottom:0}.preheader{color:#fff0;display:none;height:0;max-height:0;max-width:0;opacity:0;overflow:hidden;mso-hide:all;visibility:hidden;width:0}.powered-by a{text-decoration:none}@media only screen and (max-width:640px){.main p,.main td,.main span{font-size:16px!important}.wrapper{padding:8px!important}.content{padding:0!important}.container{padding:0!important;padding-top:8px!important;width:100%!important}.main{border-left-width:0!important;border-radius:0!important;border-right-width:0!important}.btn table{max-width:100%!important;width:100%!important}.btn a{font-size:16px!important;max-width:100%!important;width:100%!important}}@media all{.ExternalClass{width:100%}.ExternalClass,.ExternalClass p,.ExternalClass span,.ExternalClass font,.ExternalClass td,.ExternalClass div{line-height:100%}.apple-link a{color:inherit!important;font-family:inherit!important;font-size:inherit!important;font-weight:inherit!important;line-height:inherit!important;text-decoration:none!important}#MessageViewBody a{color:inherit;text-decoration:none;font-size:inherit;font-family:inherit;font-weight:inherit;line-height:inherit}}</style></head><body>';
    // }

    private function configureTransport(): void
    {
        $host = $this->mailConfig->host;
        if ($host === '') {
            return;
        }

        $this->mailer->isSMTP();
        $this->mailer->Host = $host;
        $this->mailer->SMTPAuth = $this->mailConfig->authentication;
        $this->mailer->Username = $this->mailConfig->username;
        $this->mailer->Password = $this->mailConfig->password;
        $this->mailer->Port = $this->mailConfig->port;
        $this->mailer->Timeout = self::SMTP_TIMEOUT_SECONDS;

        $smtp = $this->mailer->getSMTPInstance();
        $smtp->Timeout = self::SMTP_TIMEOUT_SECONDS;
        $smtp->Timelimit = self::SMTP_CONNECTION_TIMEOUT_SECONDS;

        $this->mailer->SMTPKeepAlive = true;
        $this->mailer->CharSet = 'UTF-8';

        $secure = $this->mailConfig->encryption;
        if ($secure === 'tls' || $secure === 'starttls') {
            $this->mailer->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            return;
        }

        if ($secure === 'ssl' || $secure === 'smtps') {
            $this->mailer->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        }
    }

}
