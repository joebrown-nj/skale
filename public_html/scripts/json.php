<?php
declare(strict_types=1);

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

use App\Core\Environment;

require_once dirname(__DIR__, 2).'/vendor/autoload.php';

$projectRoot = dirname(__DIR__, 2);

Environment::boot($projectRoot);

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$connection = new mysqli(
    $_ENV['DB_HOST'],
    $_ENV['DB_USER'],
    $_ENV['DB_PASS'],
    $_ENV['DB_NAME']
);
$connection->set_charset('utf8mb4');

try {
    $buttonClicksTable = resolveTableName($connection, ['log_button_clicks']);
    $rows = fetchAll($connection, $buttonClicksTable);
    $envKeys = array_keys($_ENV);

    $summary = removeEnvironmentData($connection, $buttonClicksTable, $rows, $envKeys);

    echo buildSummary($buttonClicksTable, $summary);
} catch (Throwable $exception) {
    fwrite(STDERR, '[json-cleanup] '.$exception->getMessage().PHP_EOL);
    exit(1);
} finally {
    $connection->close();
}

function buildSummary(string $table, array $summary): string
{
    $output = [];
    $output[] = 'Server info cleanup complete';
    $output[] = 'Table: '.$table;
    $output[] = 'Rows scanned: '.$summary['scanned'];
    $output[] = 'Rows updated: '.$summary['updated'];
    $output[] = 'Rows unchanged: '.$summary['unchanged'];
    $output[] = 'Rows skipped (invalid JSON): '.$summary['skipped'];
    $output[] = 'Environment keys removed: '.$summary['removedKeys'];

    return implode(PHP_EOL, $output).PHP_EOL;
}

function removeEnvironmentData(mysqli $connection, string $table, array $rows, array $envKeys): array
{
    if ($rows === [] || $envKeys === []) {
        return [
            'scanned' => count($rows),
            'updated' => 0,
            'unchanged' => count($rows),
            'skipped' => 0,
            'removedKeys' => 0,
        ];
    }

    $summary = [
        'scanned' => count($rows),
        'updated' => 0,
        'unchanged' => 0,
        'skipped' => 0,
        'removedKeys' => 0,
    ];

    $connection->begin_transaction();

    try {
        foreach ($rows as $row) {
            $serverInfo = json_decode($row['serverInfo'], true);

            if (!is_array($serverInfo)) {
                $summary['skipped']++;
                continue;
            }

            $removedKeyCount = 0;
            $sanitizedServerInfo = removeKeys($serverInfo, $envKeys, $removedKeyCount);

            if ($removedKeyCount === 0) {
                $summary['unchanged']++;
                continue;
            }

            updateServerInfo($connection, $table, (int) $row['id'], $sanitizedServerInfo);

            $summary['updated']++;
            $summary['removedKeys'] += $removedKeyCount;
        }

        $connection->commit();
    } catch (Throwable $exception) {
        $connection->rollback();
        throw $exception;
    }

    return $summary;
}

function removeKeys(array $serverInfo, array $keysToRemove, int &$removedKeyCount): array
{
    $removedKeyCount = 0;

    foreach ($keysToRemove as $key) {
        if (!array_key_exists($key, $serverInfo)) {
            continue;
        }

        unset($serverInfo[$key]);
        $removedKeyCount++;
    }

    return $serverInfo;
}

function updateServerInfo(mysqli $connection, string $table, int $id, array $serverInfo): void
{
    $encodedServerInfo = json_encode(
        $serverInfo,
        JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE
    );

    if ($encodedServerInfo === false) {
        throw new RuntimeException('Unable to encode sanitized server info for row '.$id.'.');
    }

    $sql = sprintf(
        'UPDATE `%s` SET `serverInfo` = ? WHERE `id` = ?',
        $connection->real_escape_string($table)
    );

    $statement = $connection->prepare($sql);
    $statement->bind_param('si', $encodedServerInfo, $id);
    $statement->execute();
}

function fetchAll(mysqli $connection, string $table, string $orderByColumn = 'id'): array
{
    $sql = sprintf(
        'SELECT id, serverInfo FROM `%s` ORDER BY `%s` DESC',
        $connection->real_escape_string($table),
        $connection->real_escape_string($orderByColumn)
    );

    $result = $connection->query($sql);

    return $result->fetch_all(MYSQLI_ASSOC);
}

function resolveTableName(mysqli $connection, array $candidates): string
{
    foreach ($candidates as $candidate) {
        $result = $connection->query(
            "SHOW TABLES LIKE '".$connection->real_escape_string($candidate)."'"
        );

        if ($result->num_rows > 0) {
            return $candidate;
        }
    }

    throw new RuntimeException(
        'None of the expected tables were found: '.implode(', ', $candidates)
    );
}
