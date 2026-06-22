<?php
declare(strict_types=1);

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require_once dirname(__DIR__, 2).'/vendor/autoload.php';

use App\Core\Application;
use App\Models\EmailModel;

chdir(dirname(__DIR__));

$application = Application::getInstance();

$emailModel = $application->getContainer()->get(EmailModel::class);

$res = $emailModel->sendEmail('joseph.m.brown.84@gmail.com',
'Test Email', 
'<p>This is a test email sent from the SkaleUp application.</p>
<p>If you received this email, it means that the email sending functionality is working correctly.</p>
<p>Thank you for using SkaleUp!</p>');

echo '<pre>';
print_r($res);
echo '</pre>';