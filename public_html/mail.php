<?php

require '../vendor/autoload.php';

use Symfony\Component\Dotenv\Dotenv;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$dotenv = new Dotenv();
$dotenv->load('../.env');
$dotenv->load('../.env'.strtoupper($_ENV['APP_ENV']));

$msg = '<p>Name,</p>';
$msg = '<p>Thanks for being awesome!</p>';
$msg .= '<p>We have received your message and would like to thank you for writing to us. If your inquiry is urgent, please use the telephone number listed below to talk to one of our staff members.</p>';
$msg .= '<p>Otherwise, we will reply by email as soon as possible.</p>';
$msg .= '<p>Talk to you soon, '.$_ENV['SITE_NAME'].'</p>';

// mail('joebro84@yahoo.com','subj',$msg);
// die;

$mailer = new PHPMailer(true);
// Configure SMTP settings here if needed
// $mailer->SMTPDebug = SMTP::DEBUG_SERVER;                     //Enable verbose debug output
// $mailer->isSMTP();                                            //Send using SMTP
$mailer->Host       = $_ENV['SMTP_SERVER'];                   //Set the SMTP server to send through
// $mailer->SMTPAuth   = $_ENV['SMTP_AUTH'];                     //Enable SMTP authentication
// $mailer->Username   = $_ENV['SMTP_USERNAME'];                 //SMTP username
// $mailer->Password   = $_ENV['SMTP_PASSWORD'];                 //SMTP password
// $mailer->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
// $mailer->Port       = $_ENV['SMTP_PORT'];                     //TCP port to connect to; use 587 if you have set `SMTP_Secure = PHPMailer::ENCRYPTION_STARTTLS`

//Recipients
$mailer->setFrom($_ENV['CONTACT_FORM_FROM_EMAIL'], $_ENV['SITE_NAME']);
// $mailer->addAddress($recipient, $recipientName);           //Add a recipient
// $mailer->addAddress('ellen@example.com');               //Name is optional
$mailer->addReplyTo($_ENV['CONTACT_FORM_REPLY_EMAIL'], $_ENV['SITE_NAME']);
// $mailer->addCC('cc@example.com');
// $mailer->addBCC('joebro84@yahoo.com');

try {
    $mailer->isHTML(true);
    $mailer->addAddress('joebro84@yahoo.com', 'joe');
    $mailer->Subject = 'test';
    $mailer->Body = $msg;

    $res = $mailer->send();
    var_dump($res);
} catch (Exception $e) {
    // Log error or handle as needed
    var_dump($e);
}
