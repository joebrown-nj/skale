<?php
declare(strict_types=1);

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require_once dirname(__DIR__, 2).'/vendor/autoload.php';

use App\Core\Application;
use App\Core\Services\EmailQueueService;

chdir(dirname(__DIR__));

$application = Application::getInstance();
$queue = $application->getContainer()->get(EmailQueueService::class);
$summary = $queue->processPending();

echo 'Email queue processed'.PHP_EOL;
echo 'Claimed: '.$summary['claimed'].PHP_EOL;
echo 'Sent: '.$summary['sent'].PHP_EOL;
echo 'Retried: '.$summary['retried'].PHP_EOL;
echo 'Failed: '.$summary['failed'].PHP_EOL;
echo 'Deferred: '.$summary['deferred'].PHP_EOL;
