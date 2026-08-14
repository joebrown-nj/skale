<?php
declare(strict_types=1);

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require_once dirname(__DIR__, 2).'/vendor/autoload.php';

use App\Core\Application;
use App\Core\Services\EmailQueueService;

$projectRoot = dirname(__DIR__, 2);
chdir($projectRoot);

/**
 * @return array{retryFailed: bool, retryId: ?string}
 */
function parseCliOptions(array $argv): array
{
	$retryFailed = false;
	$retryId = null;

	foreach ($argv as $argument) {
		if ($argument === '--retry-failed') {
			$retryFailed = true;
			continue;
		}

		if (str_starts_with($argument, '--retry-id=')) {
			$value = trim(substr($argument, strlen('--retry-id=')));
			$retryId = preg_match('/^[a-f0-9]{32}$/i', $value) === 1 ? strtolower($value) : null;
		}
	}

	return [
		'retryFailed' => $retryFailed,
		'retryId' => $retryId,
	];
}

function requeueFailedJobs(string $projectRoot, ?string $jobId = null): int
{
	$failedDir = $projectRoot.'/var/email-queue/failed';
	$pendingDir = $projectRoot.'/var/email-queue/pending';

	if (!is_dir($failedDir)) {
		return 0;
	}

	if (!is_dir($pendingDir) && !@mkdir($pendingDir, 0777, true) && !is_dir($pendingDir)) {
		return 0;
	}

	$pattern = $jobId !== null
		? $failedDir.'/'.$jobId.'.json'
		: $failedDir.'/*.json';

	$moved = 0;
	$failedFiles = glob($pattern) ?: [];
	foreach ($failedFiles as $failedPath) {
		$targetPath = $pendingDir.'/'.basename($failedPath);
		if (@copy($failedPath, $targetPath)) {
			$moved++;
		}
	}

	return $moved;
}

$options = parseCliOptions($argv ?? []);
$retryCount = 0;
if ($options['retryFailed'] || $options['retryId'] !== null) {
	$retryCount = requeueFailedJobs($projectRoot, $options['retryId']);
}

$application = Application::getInstance();
$queue = $application->getContainer()->get(EmailQueueService::class);
$summary = $queue->processPending();

echo 'Email queue processed'.PHP_EOL;
if ($options['retryFailed'] || $options['retryId'] !== null) {
	echo 'Requeued from failed: '.$retryCount.PHP_EOL;
}
echo 'Claimed: '.$summary['claimed'].PHP_EOL;
echo 'Sent: '.$summary['sent'].PHP_EOL;
echo 'Retried: '.$summary['retried'].PHP_EOL;
echo 'Failed: '.$summary['failed'].PHP_EOL;
echo 'Deferred: '.$summary['deferred'].PHP_EOL;
